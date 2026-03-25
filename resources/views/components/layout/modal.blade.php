<flux:modal name="new-note" class="md:w-96">
    <form class="space-y-6">
        <flux:heading size="lg">New Note</flux:heading>
        <flux:input placeholder="New title..." />
        <flux:textarea placeholder="New content..." />
        <div class="flex">
            <flux:button type="submit" variant="primary" class="me-4">Add Note</flux:button>
        </div>
    </form>
</flux:modal>