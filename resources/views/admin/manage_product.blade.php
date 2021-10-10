@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')
@if($id>0)
{{$image_required=""}}
@else
{{$image_required="required"}}
@endif
<h1 class="mb10">Manage Product</h1>
<a href="{{url('admin/product')}}">
<button type="button" class="btn btn-success" name="button">Back</button>
</a>
<form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
   <div class="row">
      <div class="table-responsive m-b-40">
         <div class="card">
            <div class="card-body">
               @csrf
               <div class="form-group">
                  <label for="name" class="control-label mb-1">Name</label>
                  <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  @error('name')
                  <div class="alert alert-danger" role="alert">
                     {{$message}}
                  </div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="slug" class="control-label mb-1">Slug</label>
                  <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  @error('slug')
                  <div class="alert alert-danger" role="alert">
                     {{$message}}
                  </div>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="image" class="control-label mb-1">Image</label>
                  <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                  @error('image')
                  <div class="alert alert-danger" role="alert">
                     {{$message}}
                  </div>
                  @enderror
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-4">
                        <label for="category" class="control-label mb-1">Category</label>
                        <select  id="category_id" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           <option value="">Select Categories
                              @foreach($category as $list)
                              @if($category_id==$list->id)
                           <option selected value="{{$list->id}}">
                              @else
                           <option value="{{$list->id}}">
                              @endif
                              {{$list->category_name}}
                           </option>
                           @endforeach
                           </option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="brnad" class="control-label mb-1">Brand</label>
                           <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="model" class="control-label mb-1">Model</label>
                           <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="short_desc" class="control-label mb-1">Short_desc</label>
                  <textarea id="short_desc"
                     name="short_desc" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$short_desc}}</textarea>
               </div>
               <div class="form-group">
                  <label for="desc" class="control-label mb-1">Description</label>
                  <textarea  id="desc"
                     name="desc" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$desc}}</textarea>
               </div>
               <div class="form-group">
                  <label for="keywords" class="control-label mb-1">Keywords</label>
                  <textarea id="keywords"
                     name="keywords" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$keywords}}</textarea>
               </div>
               <div class="form-group">
                  <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                  <textarea  id="technical_specification"
                     name="technical_specification" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$technical_specification}}</textarea>
               </div>
               <div class="form-group">
                  <label for="uses" class="control-label mb-1">Uses</label>
                  <textarea id="uses"
                     name="uses" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$uses}}</textarea>
               </div>
               <div class="form-group">
                  <label for="warranty" class="control-label mb-1">Warranty</label>
                  <textarea id="warranty"
                     name="warranty" type="text"
                     class="form-control" aria-required="true"
                     aria-invalid="false" required>{{$warranty}}</textarea>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="table-responsive m-b-40">
     <h2 class="mb10">Product Attributes</h2>
      <div class="card">
         <div class="card-body">
           <div class="form-group">
              <div class="row">

                 <div class="col-md-2">
                    <div class="form-group">
                       <label for="sku" class="control-label mb-1">SKU</label>
                       <input id="model" value="" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <label for="mrp" class="control-label mb-1">MRP</label>
                       <input id="mrp" value="" name="mrp" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <label for="price" class="control-label mb-1">Price</label>
                       <input id="price" value="" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <label for="size_id" class="control-label mb-1">Size</label>
                    <select  id="size_id" name="size_id"  class="form-control" aria-required="true" aria-invalid="false" required>
                       <option value="">Select</option>
                          @foreach($sizes as $list)
                            <option value="{{$list->id}}">
                              {{$list->size}}
                            </option>
                       @endforeach

                    </select>
                 </div>
                 <div class="col-md-3">
                    <label for="color_id" class="control-label mb-1">Color</label>
                    <select  id="color_id" name="color_id"  class="form-control" aria-required="true" aria-invalid="false" required>
                       <option value="">Select</option>
                          @foreach($colors as $list)
                            <option value="{{$list->id}}">
                              {{$list->color}}
                            </option>
                       @endforeach

                    </select>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <label for="qty" class="control-label mb-1">Qty</label>
                       <input id="qty" value="" name="qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <label for="attr_image" class="control-label mb-1">Image</label>
                    <input id="attr_image"  name="attr_image" type="file" class="form-control" aria-required="true" aria-invalid="false" required>

                 </div>
                 <div class="col-md-2">
                    <label for="attr_image" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp;</label>
                    <button type="button" class="btn btn-success btn-lg" name="button">
                      <i class="fa fa-plus"></i>
                      &nbsp; Add
                    </button>
                 </div>

              </div>
           </div>

         </div>
      </div>
   </div>
   <div>
      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
      Submit
      </button>
   </div>
   <input type="hidden" name="id" value="{{$id}}"/>
</form>
@endsection
