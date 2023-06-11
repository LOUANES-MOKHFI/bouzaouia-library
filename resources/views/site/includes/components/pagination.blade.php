<div class="store-filter clearfix">
    <span class="store-qty">عرض {{\App\Models\Book::where('is_active',1)->count() > 16 ? 16 : $books->count()}} من  {{\App\Models\Book::where('is_active',1)->count()}} كتاب</span>
    <ul class="store-pagination">
        {!! $books->links() !!}
    </ul>
</div>