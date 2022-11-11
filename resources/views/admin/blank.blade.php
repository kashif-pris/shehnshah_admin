@extends('layouts.main')
@section('content')

    <style>
        .stretch-card {
            display: inline-block;
            text-align: center;
        }

        i.col-12.pb-3.fa {
            font-size: 55px;
        }
        .text {
         
            color: :white;
        }
    </style>

    <div class="page-header">
        <h3 class="page-title">
            Blank Page
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">


                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <i class="col-12 pb-3   fa fa-building" aria-hidden="true"></i>
                            <a href="/business/business-setup" target="_parent">
                                <button type="button" class="btn  btn-outline-success btn-fw"

                                 {{-- data-toggle="modal"  --}}
                                        data-target="#exampleModal-4"
                                        data-whatever="@mdo">Business Setup
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <i class="col-12 pb-3  fa fa-users" aria-hidden="true"></i>
                            <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog"
                                 aria-labelledby="ModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name"
                                                           class="col-form-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/vendors/vendor-list-show-all" target="_parent">
                                <button type="button" class="btn  btn-outline-success btn-fw"
                                 {{-- data-toggle="modal" --}}
                                        data-target="#exampleModal-4"
                                        data-whatever="@mdo">Vendors
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <i class="col-12 pb-3   fa fa-tasks" aria-hidden="true"></i>
                            <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog"
                                 aria-labelledby="ModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name"
                                                           class="col-form-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/service/service-list" target="_parent">
                                <button type="button" class="btn  btn-outline-success btn-fw"
                                 {{-- data-toggle="modal" --}}
                                        data-target="#exampleModal-4"
                                        data-whatever="@mdo">Services
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <i class="col-12 pb-3  fa fa-share" aria-hidden="true"></i>
                            <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog"
                                 aria-labelledby="ModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name"
                                                           class="col-form-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('offering-list') }}" target="_parent">
                            <button type="button" class="btn  btn-outline-success btn-fw" 
                            {{-- data-toggle="modal"   --}}
                            data-target="#exampleModal-4"
                                    data-whatever="@mdo">Offerings
                            </button>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection