<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <!-- Dashboard -->
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navlist.item>

            <!-- Platform Group -->
            @if(auth()->user()->can('role.create') || auth()->user()->can('role.edit') || auth()->user()->can('role.delete') || auth()->user()->can('role.show'))
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="user" :href="route('users.index')" :current="request()->routeIs('users.index')" wire:navigate>
                        {{ __('Users') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="key" :href="route('roles.index')" :current="request()->routeIs('roles.index')" wire:navigate>
                        {{ __('Roles') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="key" :href="route('activity.logs')" :current="request()->routeIs('activity.logs')" wire:navigate>
                        {{ __('Activity Logs') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            @endif

            <!-- Programs Group -->
            <flux:navlist.group :heading="__('Programs')" class="grid">
                @can('Pwd')
                    <flux:navlist.item icon="user-group" :href="route('pwd.list')" :current="request()->routeIs('pwd.list')" wire:navigate>
                        {{ __('Person with Disabilities') }}
                    </flux:navlist.item>
                @endcan

                @can('Aics')
                    <flux:navlist.item icon="user-group" :href="route('aics.list')" :current="request()->routeIs('aics.list')" wire:navigate>
                        {{ __('AICs') }}
                    </flux:navlist.item>
                @endcan

                @can('SoloParent')
                    <flux:navlist.item icon="user" :href="route('solo-parent.list')" :current="request()->routeIs('solo-parent.list')" wire:navigate>
                        {{ __('Solo Parent') }}
                    </flux:navlist.item>
                @endcan

                @can('SeniorCitizen')
                    <flux:navlist.item icon="adjustments-horizontal" :href="route('senior-citizen.list')" :current="request()->routeIs('senior-citizen.list')" wire:navigate>
                        {{ __('Senior Citizens') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="adjustments-horizontal" :href="route('senior-citizen.deceased')" :current="request()->routeIs('senior-citizen.deceased')" wire:navigate>
                        {{ __('Senior Citizens Deceased') }}
                    </flux:navlist.item>                    
                @endcan
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down"
            />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile Header -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:spacer />
        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down"
            />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>
</html>
