<div class="ms-auto">
    <div class="btn-group">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
        <button type="submit" class="btn btn-primary">تسجيل الخروج</button>
    </form>
    </div>
</div>
