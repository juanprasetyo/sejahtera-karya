<x-app-layout>
  <x-authentication-card>
      <x-slot name="logo">
          <x-authentication-card-logo />
      </x-slot>
  
      <x-validation-errors class="mb-4" />
  
      @livewire('complete-profile')
  </x-authentication-card>
</x-app-layout>
