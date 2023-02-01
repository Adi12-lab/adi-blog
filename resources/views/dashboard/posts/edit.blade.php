@extends("dashboard.layouts.main")
@section("container")
<div class="row mb-3">
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Post</h1>
    </div>
  </main>
  <div class="col-md-9 ms-auto">
    <form action="/dashboard/posts/{{$post->slug}}" method="post">
      @csrf
      @method("put")
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error("title") is-invalid @enderror" value="{{old("title",$post->title)}}" id="title" name="title">
        @error("title")
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error("slug") is-invalid @enderror" value="{{old("slug", $post->slug)}}" id="slug" name="slug">
        @error("slug")
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Category</label>
        <select class="form-select @error("category_id") is-invalid @enderror" name="category_id">
          @foreach($categories as $category)
            @if(old("category_id", $post->category_id) == $category->id)
          <option value="{{$category->id}}" selected> {{$category->name }}</option>
            @else 
          <option value="{{$category->id}}"> {{$category->name }}</option>
            @endif
          @endforeach
        </select>
        @error("category_id")
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error("body")
        <p class="text-danger">
          {{$message}}
        </p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{old("body", $post->body)}}">
        <trix-editor input="body"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>


<script>
  const title = document.querySelector("#title");
  const slug = document.querySelector("#slug");

  title.addEventListener("change", function() {
  fetch("/dashboard/posts/createSlug?title=" + title.value)
  .then(response => response.json())
  .then(data => slug.value = data.slug)
  });

  //Menghilangkan fitur untuk menambahkan file pada trix editor
  document.addEventListener("trix-file-accept", function(e) {
  e.preventDefault();
  });
</script>
@endsection
