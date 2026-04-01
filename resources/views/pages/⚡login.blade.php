<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

new class extends Component
{
    public $email = '';
    public $password = '';
};
?>

<div>
    <x-slot name="title">Log In</x-slot>
    <section class="grid items-center h-lvh p-8 max-w-xl m-auto">
        <flux:card class="space-y-6">
            <div>
                <flux:heading size="lg">Log in to your account</flux:heading>
            </div>
            <form>
                <div class="space-y-6 mb-8">
                    <flux:input label="Email" type="email" placeholder="Your email address" wire:model="email" />

                    <flux:field>
                        <div class="mb-3 flex justify-between">
                            <flux:label>Password</flux:label>
                        </div>

                        <flux:input type="password" placeholder="Your password" wire:model="password" />

                        <flux:error name="password" />
                    </flux:field>
                </div>

                <div class="space-y-2">
                    <flux:button type="submit" variant="primary" color="zinc" class="w-full">Log in</flux:button>
                </div>
            </form>
        </flux:card>
    </section>
</div>