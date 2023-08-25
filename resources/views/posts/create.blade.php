@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post_Create') }}</div>

                <div class="card-body">
                    <div class="create-items">
                        <div class="form">
                          <form action="/posts" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="input-form">
                              <label for="name">Name</label>
                              <input name="name">
                            </div>
                            
                            <div class="input-form">
                              <label for="image">Image</label>
                              <input type="file" name="image">
                            </div>
                            
                            <div class="input-form">
                              <label for="breed">Breed</label>
                              <input name="breed">
                            </div>
                            
                            <div class="input-form">
                              <label for="age">Age</label>
                              <input type="number" name="age" min="0">
                            </div>
                            
                            <div class="input-form">
                              <label for="gender">Gener</label>
                              <select name="gender">
                               	<option value="オス">オス</option>
	                            <option value="メス">メス</option>
                              </select>
                            </div>
                            
                            <div class="input-form">
                              <label for="explanation">Explanation</label>
                              <p>性格や癖など、その他の情報を教えてあげましょう。</p>
                              <textarea name="explanation" rows="4" cols="40"></textarea>
                            </div>
                            
                            <div class="input-form">
                              <input type="submit" value="Submit">
                            </div>
                            
                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection