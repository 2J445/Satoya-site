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
                              <label for="antique_typee">Gener</label>
                              <select name="antique_type">
                               	<option value="家具">家具</option>
	                              <option value="服飾">服飾</option>
	                              <option value="レコード">レコード</option>
	                              <option value="玩具">玩具</option>
	                              <option value="食器">食器</option>
	                              <option value="人形">人形</option>
	                              <option value="その他">その他</option>
                              </select>
                            </div>
                            
                            <div class="input-form">
                              <label for="image">Image</label>
                              <input type="file" name="image">
                            </div>
                            
                            <div class="input-form">
                              <label for="old">Old</label>
                              <input type="number" name="old" min="0">
                            </div>
                            
                            <div class="input-form">
                              <label for="explanation">Explanation</label>
                              <p>出展品の特徴や情報を書き込んでください</p>
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