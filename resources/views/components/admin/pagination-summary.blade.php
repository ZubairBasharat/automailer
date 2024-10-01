@props([
    'items',
])
<div class="d-flex justify-content-between align-items-center">
    <span class="mb-0">Showing {{ $items?->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} entries</span>
    {{ $items->links() }}
</div>