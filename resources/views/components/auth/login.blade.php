@props(['register' => false])

<x-dashboard::blank title="Login">
    <x-dashboard::flex vertical
        stretch
        x="center"
        y="center">

        <div class="col-sm-12 text-center p-8">
            <a href="/"
                class="mb-12">
                <img alt="{{ config('app.name') }}"
                    src=""
                    width="100" />
            </a>
        </div>

        <div class="w-lg-500px">
            <div class="w-100 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <x-dashboard::form :action="route('login')">
                    {!! $slot !!}

                    <x-dashboard::form.input required
                        name="email"
                        type="email">
                        Email
                    </x-dashboard::form.input>

                    <x-dashboard::form.input name="password"
                        type="password"
                        required />

                    <x-dashboard::form.checkbox name="remember" class="mt-5"
                        value="true">
                        Remember Me
                    </x-dashboard::form.checkbox>

                    <x-dashboard::form.submit class="w-100 mt-5"
                        size="lg">
                        Login
                    </x-dashboard::form.submit>

                    @if ($register)
                        <x-dashboard::btn type="button"
                            color="danger"
                            size="lg"
                            class="w-100 mt-5">
                            Sign Up
                        </x-dashboard::btn>
                    @endif
                </x-dashboard::form>
            </div>
        </div>
    </x-dashboard::flex>
</x-dashboard::blank>
