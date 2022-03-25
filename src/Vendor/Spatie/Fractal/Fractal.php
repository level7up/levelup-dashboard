<?php
namespace Level7up\Dashboard\Vendor\Spatie\Fractal;

use Closure;
use League\Fractal\Manager;
use Spatie\Fractal\Fractal as BaseFractal;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\SerializerAbstract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class Fractal extends BaseFractal
{
    public static function create($data = null, $transformer = null, $serializer = null)
    {
        $fractal = new static(new Manager());

        $fractal->data = $data;
        $fractal->dataType = $fractal->determineDataType($data);
        $fractal->transformer = $transformer ?: null;
        $fractal->serializer = $serializer ?: null;

        if (config('fractal.auto_includes.enabled')) {
            $requestKey = config('fractal.auto_includes.request_key');

            $include = app('request')->query($requestKey, []);

            $pos = array_search('api_token', $include);

            if ($pos >= 0) {
                unset($include[$pos]);
            }

            $fractal->parseIncludes($include);
        }

        if (empty($serializer)) {
            $serializer = config('fractal.default_serializer');
        }

        if ($data instanceof LengthAwarePaginator) {
            $paginator = config('fractal.default_paginator');

            if (empty($paginator)) {
                $paginator = IlluminatePaginatorAdapter::class;
            }

            $fractal->paginateWith(new $paginator($data));
        }

        if (empty($serializer)) {
            return $fractal;
        }

        if ($serializer instanceof SerializerAbstract) {
            return $fractal->serializeWith($serializer);
        }

        if ($serializer instanceof Closure) {
            return $fractal->serializeWith($serializer());
        }

        if ($serializer == JsonApiSerializer::class) {
            $baseUrl = config('fractal.base_url');

            return $fractal->serializeWith(new $serializer($baseUrl));
        }

        return $fractal->serializeWith(new $serializer);
    }

    public function respond($statusCode = 200, $headers = [], $options = 0)
    {
        $response = parent::respond($statusCode, $headers, $options);
        $message = null;

        if (isset(debug_backtrace()[2]) && isset(debug_backtrace()[2]['class'])) {
            $key = sprintf(
                "site.%s.%s",
                debug_backtrace()[2]['class'],
                debug_backtrace()[2]['function']
            );

            $message = trans()->has($key) ? trans($key) : null;
        }

        $data = $this->createData()->toArray();

        if (isset($data['meta'])) {
            $meta = $data['meta']['pagination'];
            unset($data['meta']);
        }

        if ($this->data instanceof LengthAwarePaginator) {
            $data = array_values($data);
        }

        if ($this->data instanceof Paginator) {
            // $meta[] = [];
        }

        $response->setData([
            'data' => $data,
            'status' => true,
            'message' => $message,
            'meta' => $meta ?? null,
        ]);

        return $response;
    }
}
