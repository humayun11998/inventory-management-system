@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Supplier and Product Wise Report</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <strong> Supplier Wise Report </strong>
                            <input class="search_value" type="radio" name="supplier_wise" value="supplier_wise"> &nbsp;&nbsp;

                            <strong> Product Wise Report </strong>
                            <input class="search_value" type="radio" name="product_wise" value="product_wise">
                        </div>
                    </div>

                    <div class="show_supplier" style="display:none">
                        <form method="GET" action="{{ route('supplier.wise.pdf') }}" target="_blank" id="myForm">
                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label for="">Supplier Name</label>
                                    <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                                        <option value="">Select Supplier</option>
                                        @foreach ($supplier as $supp)
                                        <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                        @endforeach
                                        </select>
                                </div>



                                <div class="col-sm-4" style="padding-top: 28px">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>

                            </div>

                        </form>

                    </div>




                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>
                <script type="text/javascript">
                    $(document).ready(function (){
                        $('#myForm').validate({
                            rules: {
                                supplier_id: {
                                    required : true,
                                },
                            },
                            messages :{
                                supplier_id: {
                                    required : 'Please Select Supplier',
                                },
                            },
                            errorElement : 'span',
                            errorPlacement: function (error,element) {
                                error.addClass('invalid-feedback');
                                element.closest('.form-group').append(error);
                            },
                            highlight : function(element, errorClass, validClass){
                                $(element).addClass('is-invalid');
                            },
                            unhighlight : function(element, errorClass, validClass){
                                $(element).removeClass('is-invalid');
                            },
                        });
                    });

                </script>

                <script type="text/javascript">
                    $(document).on('change','.search_value', function(){
                        var search_value = $(this).val();
                        if (search_value == 'supplier_wise') {
                            $('.show_supplier').show();
                        }else{
                            $('.show_supplier').hide();
                        }
                    });
                </script>



@endsection
