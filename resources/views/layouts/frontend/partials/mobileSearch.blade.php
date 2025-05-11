<div class="mobile-search">
    <div class="container">
        <div class="row d-flex justify-content-center gy-4">
            <div class="col-10">
                <label>What are you looking for?</label>
                <input id="searchInput"
                       type="text"
                       placeholder="Search by Title"
                       data-search-base-url="{{ url('/search-news') }}">
            </div>
            <div class="col-2 d-flex justify-content-end align-items-sm-center align-items-end gap-2">
                <div class="search-cross-btn" id="searchBtn">
                    <i class='bi bi-search'></i>
                </div>
                <div class="search-cross-btn">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
        </div>
    </div>
</div>
