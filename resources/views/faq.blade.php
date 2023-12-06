@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')
  <div class="container-fluid p-0" style="
        background-color: rgba(18, 32, 59, 0.09);
        padding: 30px 0px !important;
        min-height: 100vh;
      ">
    <div class="container">
      <div class="row">
       <div class="col-12 contact FAQ">
<h2 class="text-center mx-auto">Frequently asked questions</h2>
<p class="text-center mx-auto">Everything you need to know about the website.</p>
<div class="accordion mx-auto" id="accordionExample">
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Is there a free trial available?
        </button>
      </h3>
      <div id="collapseOne" class=" accordion-collapse collapse show  border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Can I change my plan later?
        </button>
      </h3>
      <div id="collapseTwo" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            What is your cancellation policy?
        </button>
      </h3>
      <div id="collapseThree" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            Can other info be added to an invoice?
        </button>
      </h3>
      <div id="collapseFour" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    <div class="accordion-item">
        <h3 class="accordion-header  border-0">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
              Morem ipsum dolor sit amet, consectetur adipiscing elit.
          </button>
        </h3>
        <div id="collapseFive" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
        </div>
      </div>
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            How do I change my account email?
        </button>
      </h3>
      <div id="collapseSix" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h3 class="accordion-header  border-0">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            How do I change my account email?
        </button>
      </h3>
      <div id="collapseSeven" class=" accordion-collapse collapse   border-0" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            Corem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</div>
      </div>
    </div>
    

  </div>
       </div>
      </div>
    </div>
  </div>
  <!-- NAVBAR SEARCH ICON JS  -->
  @endsection

  @section('footer')
      @include('layouts.footer')
  @endsection
  