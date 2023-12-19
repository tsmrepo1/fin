@extends('layouts.instructor')

@section('content')
<div class="db__content">
    <div class="content-wrap">
        <div class="content-box has-h2--bold">
            <h2>Earnings Overview</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
            @if(isset($Message))
    <p style="color: green;">{{$Message}}</p>
@else
    
@endif
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Transactions</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Get Paid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Payment Method</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive-md earnings-table-wrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Course</th>
                                <th>Amount</th>
                                <th>Ref ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($histories['History'] as $values) { ?>
                            <tr>
                                <td>{{$values['Date']}}</td>
                                <td>{{$values['Type']}}</td>
                                <td>{{$values['Desc']}}</td>
                                <td>{{$values['Name']}}</td>
                                <td>{{"$".$values['Amount']}}</td>
                                <td>{{$values['referrer']}}</td>
                                <td>{{$values['status']}}</td>
                            </tr>
                            <?php  }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4>Available Balance</h4>
                            <h5><span>{{"$".$Balance}}</span></h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <h3>To withdraw earnings, first you need to set up a withdrawal method.</h3>
                                <p>It may take up to 3 days to activate your withdrawal method.</p>
                                <div>
                                    <button class="btn btn--primary" data-bs-toggle="modal" data-bs-target="#addPaymentFormModal">Add Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h4>Payment Method</h4>
                <div class="table-responsive">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>
        </div>



        <div class="text-end">
            <button class="btn btn--primary" data-bs-toggle="modal" data-bs-target="#redeemFormModal">Redeem Earning</button>
        </div>

        <div class="modal fade" id="addPaymentFormModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentFormModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h4 class="mb-0 text--dark fw-bold">Add Payment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="add-payment-form-wrap">
                      <form action="{{route('instructor.paymentadd')}}" method="POST"  autocomplete="off">
                        @csrf
                        <div class="mb--20">
                          <p class="mb-3 text--dark fw-medium">Choose Option:</p>
                          <ul class="main-options">
                            <li>
                              <input type="radio" name="apf_type" value="bank account" id="apfType1">
                              <label for="apfType1">Bank Account</label>
                            </li>
                            <li>
                              <input type="radio" name="apf_type" value="paypal" id="apfType2">
                              <label for="apfType2">Paypal</label>
                            </li>
                          </ul>
                        </div>

                        <fieldset class="mb--20 d-none" data-category="bank account">
                        <div class="mb-3">
                            <input type="text" name="apf_ben_name" placeholder="Enter Benefisiary Name">
                          </div>
                          <div class="mb-3">
                            <input type="text" name="apf_bank_name" placeholder="Enter Bank Name">
                          </div>
                          <div class="mb-3">
                            <input type="number" name="apf_account_no" placeholder="Enter account number">
                          </div>
                          <div class="mb-3">
                            <input type="text" name="apf_ifsc_code" placeholder="Enter IFSC code">
                          </div>
                        </fieldset>

                        <fieldset class="mb--20 d-none" data-category="paypal">
                          <div>
                            <input type="text" name="apf_paypal_url" placeholder="Enter paypal url">
                          </div>
                        </fieldset>

                        <div class="submit-btn-container d-none">
                          <button type="submit" class="btn btn--primary w-100">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Redeem Modal -->
        <div class="modal fade" id="redeemFormModal" tabindex="-1" role="dialog" aria-labelledby="redeemFormModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h4 class="mb-0 text--dark fw-bold">Redeem Form</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="redeem-form-wrap">
                            <form action="{{route('instructor.withdrawlrequest')}}" method="POST">
                              @csrf
                                <div class="mb--20">
                                    <input type="number" name="rf_amount" placeholder="Enter amount here..." required="">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn--primary w-100">Redeem Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>
@stop