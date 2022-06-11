<?php
namespace Level7up\Dashboard\Util;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;


final class SideMenuUtil
{
    protected $item = [];

    protected $parent_group = null;

    /**
     * Rest dashboard ui side menu
     *
     * @return self
     */
    public function reset()
    {
        config(['dashboard.sidebar' => []]);

        return $this;
    }

    /**
     * Push item to dashboard ui side menu config key
     *
     * @param array $item
     * @return self
     */
    public function push(array $item): self
    {
        if ($this->parent_group) {
            return $this->appendTo();
        }

        $key = Str::slug($item['title']);

        $item['order'] ??= self::getMaxOrder();

        config(["dashboard.sidebar.${key}" => $item]);

        return $this;
    }

    /**
     * Append to items array
     *
     * @return self
     */
    public function appendTo(string $title = null): self
    {
        $key = $this->parent_group ?? $this->getKey($title);

        config(["dashboard.sidebar.${key}.items.".Str::slug($this->item['title']) => $this->item]);

        $this->item = [];
        $this->parent_group = null;

        return $this;
    }

    /**
     * Push the item to config array
     *
     * @param string|null $title
     * @param string|null $icon
     * @param string|null $url
     * @param mixed $order
     * @param mixed $permissions
     * @return self
     */
    public function add(string $title = null, string $icon = null, string $url = null, $order = null, $permissions = []): self
    {
        foreach (['title', 'icon', 'url', 'order', 'permissions'] as $key) {
            if ($$key !== null) {
                $this->$key($$key);
            }
        }

        $this->push($this->item);
        $this->item = [];

        return $this;
    }

    /**
     * Add child item to parent
     *
     * @param string $title
     * @param string $url
     * @param array $permissions
     * @return self
     */
    public function item(string $title, string $url, $permissions = []): self
    {
        return $this->title($title)
            ->url($url)
            ->permissions($permissions)
            ->appendTo();
    }

    public function title(string $title): self
    {
        if (strpos($title, '.')) {
            list($parent_key, $title) = explode('.', $title);
            $this->parent_group = Str::slug($parent_key);
        }

        $this->item['title'] = $title;

        return $this;
    }

    public function icon(string $icon): self
    {
        $this->item['icon'] = $icon;

        return $this;
    }

    /**
     * Set link url
     *
     * @param string $url
     * @param array $attributes
     * @return self
     */
    public function url(string $url, array $attributes = []): self
    {
        // $this->item['url'] = $url;
        $this->item['url'] = $attributes + [
            'href' => $url,
        ];

        return $this;
    }

    /**
     * Set url by route name
     *
     * @param string $route_name
     * @param array $options
     * @param array $attributes
     * @return self
     */
    public function route(string $route_name, $options = [], $attributes = []): self
    {
        return $this->url(route($route_name, $options), $attributes);
    }

    /**
     * Set item type
     *
     * @param string $type
     * @return self
     */
    public function type(string $type): self
    {
        $this->item['type'] = $type;

        return $this;
    }

    /**
     * Set item order
     *
     * @param mixed $order
     * @return self
     */
    public function order($order): self
    {
        if (is_numeric($order)) {
            $this->item['order'] = $order;
        } else {
            $this->after($order);
        }

        return $this;
    }

    /**
     * Set item permissions
     *
     * @param mixed $permissions
     * @return self
     */
    public function permissions($permissions): self
    {
        $this->item['permissions'] = is_array($permissions) ? $permissions : Arr::make($permissions);

        return $this;
    }

    /**
     * Add before any given nav title
     *
     * @param string $title
     * @return self
     */
    public function before(string $title): self
    {
        return $this->order(
            config('dashboard.sidebar.'.Str::slug($title).'.order', self::getMaxOrder()) - 1
        );
    }

    /**
     * Add after any given nav title
     *
     * @param string $title
     * @return self
     */
    public function after(string $title): self
    {
        return $this->order(
            config('dashboard.sidebar.'.Str::slug($title).'.order', self::getMaxOrder()) + 1
        );
    }

    /**
     * Get parrent config.sidebar array index
     *
     * @param string $title
     * @return string|int
     */
    public function getKey(string $title)
    {
        return array_search($title, Arr::pluck(config('dashboard.sidebar'), 'title'));
    }

    /**
     * Get max order in sidebar
     *
     * @return int
     */
    public static function getMaxOrder()
    {
        $orders = array_column(config('dashboard.sidebar'), 'order');

        return count($orders) > 0 ? max($orders) : 9999;
    }
}
