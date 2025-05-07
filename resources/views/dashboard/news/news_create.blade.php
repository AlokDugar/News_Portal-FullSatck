@extends('layouts.dashboard')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-sm-6">
                <h3>Create News Article</h3>
            </div>
            </div>
        </div>
        </div>

      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Start off your News by writing an engaging title">
                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Image *</label>
                    <div class="d-lg-flex d-md-flex d-sm-flex align-items-center">
                        <div class="p-image">
                            <img id="image-preview" class="img-100 square profile-pic" src="{{ asset('assets/images/upload.png') }}" alt="Image Preview">
                            <div class="icon-wrapper">
                                <i class="fas fa-plus" onclick="document.getElementById('profile_image').click();"></i>
                                <input class="file-upload" id="profile_image" type="file" name="image_path" accept="image/*" style="display:none;" onchange="previewImage(event)" />
                            </div>
                        </div>
                        <button type="button" id="remove-image" class="btn btn-danger btn-sm mt-2 ms-4" onclick="removeImage()">Remove Image</button>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Category *</label>
                    <select class="js-example-basic-multiple col-sm-12 @error('category_ids') is-invalid @enderror" multiple="multiple" name="category_ids[]">
                        @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_ids')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <button type="button" id="add-category" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Add Category</button>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="js-example-basic-single col-sm-12" name="type_id">
                        <option value="">No Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="add-type" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createTypeModal">Add Type</button>
                  </div>


                  <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="Author">
                  </div>
                  <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher">
                  </div>

                  <div class="mb-3">
                    <label for="state" class="form-label">Status</label>
                    <select class="form-select @error('state') is-invalid @enderror" name="state" id="state">
                      <option>Select State</option>
                      <option value="Published">Published</option>
                      <option value="Unpublished">Unpublished</option>
                    </select>
                    @error('state')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Published Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                        <input class="form-control digits calendar @error('published_date') is-invalid @enderror"
                            type="text"
                            name="published_date"
                            value="{{ old('published_date') }}">
                    </div>
                    @error('published_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>


                  <div class="mb-3">
                    <label for="article-content" class="form-label">Content</label>
                    <textarea name="content" id="editor" class="ckeditor rich-text-editor border p-2"></textarea>
                  </div>

                  <div class="text-end mt-4">
                    <button type="button" class="btn btn-secondary me-2" onclick="window.location='{{ route('news.index') }}'">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="createTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTypeModalLabel">Create Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('types.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="typeName" class="form-label">Type Name</label>
                            <input type="text" class="form-control" id="typeName" name="name" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="allowDelete" name="allow_delete" value="1" checked>
                            <label class="form-check-label" for="allowDelete">Allow Delete</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Type</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('css')
<style>
    /* This targets the editable area inside the CKEditor 5 */
    .ck-editor__editable_inline {
        min-height: 300px; /* Adjust to desired height */
    }
</style>
@endpush
@push('scripts')
    <script>
        document.querySelectorAll(".tag-pill").forEach(tag => {
        tag.addEventListener("click", function () {
            document.querySelectorAll(".tag-pill").forEach(t => t.classList.remove("active"));
            this.classList.add("active");
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'),
        {
            ckfinder:
            {
                uploadUrl:"{{route('news.upload',['_token'=>csrf_token()])}}",
            },
            height: '500'
        })
        .catch(error=>{
            console.error(error);
        });
    </script>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }


        function removeImage() {
            document.getElementById('image-preview').src = "{{ asset('assets/images/upload.png') }}";
            document.getElementById('profile_image').value = "";
        }
    </script>

@endpush
