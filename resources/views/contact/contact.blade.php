@extends('main')
@section('content')
<div class="row">
  <div class="col-12">
    <p style="height: 5em;"></p> 
  </div>
  <div class="col-12" id="js-form-alert"></div>
</div>
<div class="row">
  <div class="col-12" >
    <div id="accordion">
    <form method="post" id="contact_form" action="{{ url('contactPost') }}" >
      @csrf
      <div class="card">  
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" type="button">
              Step 1: Your details
            </button>
          </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 col-6">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" id="first_name" class="form-control" minlength="2" name="first_name"  required>
                </div>
              </div>
              <div class="col-md-5 col-6">
                <div class="form-group">
                  <label for="last_name">Surname</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" minlength="2" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 col-10">
                <div class="form-group">
                  <label for="email">Email Adress:</label>
                  <input type="email" class="form-control" id="email" name="email"  required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 col-2 offset-5 offset-md-10">
                <button class="btn btn-primary collapsed"  aria-expended="false" aria-controls="collapseTwo" type="button" id="nextOne">Next ></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card"id="cardTwo">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" type="button">
              Step 2: More comments
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 col-12">
                <div class="form-group">
                  <label for="phone_number">Telephone number</label>
                  <input type="text" class="form-control" id ="phone_number" name="phone_number" required>
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="gender-wrapper">
                    <select class="form-control" name="gender" id="gender" style="border-radius:10px;" required>
                      <option value="" selected disabled hidden>Select Gender </option>
                      <option value="0">Male</option>
                      <option value="1">Female</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-12">
                  <label>Date of birth</label>
              </div>
            </div>
            <div class="row">
              <input type="text" class="form-control col-1 ml-3 mr-1" name="day" id="day" min="01" max="31" required>
              <input type="text" class="form-control col-1 mr-1" name="month" id="month" min="01" max="12" required>
              <input type="text" class="form-control col-1" name="year"  id="year" min="1900" max="2018" required>
            </div>
            <div class="row">
              <div class="col-md-2 col-2 offset-5 mt-4 offset-md-10">
                <button class="btn btn-primary collapsed"  aria-expended="false" aria-controls="collapseThree" type="button" id="nextTwo">Next ></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card" id="cardThree">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" type="button">
              Step 3: Final comments
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body "id="card-bodyThree">
            <div class="row">
              <div class="col-md-8 col-12">
                <div class="form-group" id="comment">
                  <label for="comment">Comments</label>
                  <textarea style="border-radius:10px;" rows="6" class="form-control" name="comment"></textarea>
                </div>
              </div> 
              <div class="col-2 offset-5 offset-md-10 align-text-bottom">
                <button type="submit" id="nextThree" class="btn btn-primary">Next ></button>
              </div> 
            </div> 
            </div>
          </div>
        </div>
      </form>
      <div></div>    
    </div>
  </div>
</div>

@endsection
@section('scripts')
@include('contact.scripts.contact_form')
@endsection