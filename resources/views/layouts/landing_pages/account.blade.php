@extends('layouts.landing_pages.layouts.app')

@section('content')
    <!-- WISHLIST AREA START -->
    @include('layouts.landing_pages.layouts.breadcrumb')
    <div class="liton__wishlist-area pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__tab-menu-list mb-50">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Dashboard <i
                                                    class="fas fa-home"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_2">Transaction <i
                                                    class="fas fa-file-alt"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_5">Member <i
                                                    class="fas fa-user"></i></a>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('form-logout').submit()">Logout
                                                <i class="fas fa-sign-out-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="liton_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>Hello <strong>{{ auth()->user()->name }}</strong> (not
                                                    <strong>{{ auth()->user()->name }}</strong>? <small><a
                                                            href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();document.getElementById('form-logout').submit();">Log
                                                            out</a></small> )
                                                </p>
                                                <p>From your account dashboard you can view your <span>recent orders</span>,
                                                    manage your <span>shipping and billing addresses</span>, and <span>edit
                                                        your password and account details</span>.</p>
                                                <form action="{{ route('changePassword') }}" method="POST">
                                                    @csrf
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Current password (leave blank to leave
                                                                    unchanged):</label>
                                                                <input type="password"
                                                                    class="@error('current_password') is-invalid @enderror"
                                                                    name="current_password">
                                                                @error('current_password')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <label>New password (leave blank to leave
                                                                    unchanged):</label>
                                                                <input type="password"
                                                                    class="@error('password') is-invalid @enderror"
                                                                    name="password">
                                                                @error('password')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <label>Confirm new password:</label>
                                                                <input type="password" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="btn-wrapper">
                                                        <button type="submit"
                                                            class="btn theme-btn-1 btn-effect-1 text-uppercase">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @php
                                            use App\Models\Transaction;
                                            use App\Helpers\Utils;
                                            
                                            $transactions = Transaction::with('detail.product')
                                                ->where('user_id', auth()->user()->id)
                                                ->latest()
                                                ->get();
                                        @endphp
                                        <div class="tab-pane fade" id="liton_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Payment Method</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (count($transactions) > 0)
                                                                @foreach ($transactions as $item)
                                                                    @php
                                                                        $additional = json_decode($item->additional);
                                                                        $total = $item->total + $additional->price;
                                                                    @endphp
                                                                    <tr>
                                                                        <td>{{ date('d M Y H:i:s', strtotime($item->date)) }}
                                                                        </td>
                                                                        <td>{{ $item->payment_method == 'take_away' ? 'Take Away' : 'Cash on delivery' }}
                                                                        </td>
                                                                        <td>Rp.
                                                                            {{ number_format($total, 2, ',', '.') }}
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary">{{ $item->status }}</span>
                                                                        </td>
                                                                        <td><a href="" data-bs-toggle="modal"
                                                                                data-name="{{ $item->name }}"
                                                                                data-email="{{ $item->email }}"
                                                                                data-phone="{{ $item->phone }}"
                                                                                data-address="{{ $item->address }}"
                                                                                data-note="{{ $item->note }}"
                                                                                data-additional="{{ $item->additional }}"
                                                                                data-total="{{ $item->total }}"
                                                                                data-payment_method="{{ $item->payment_method }}"
                                                                                data-status="{{ $item->status }}"
                                                                                data-date="{{ $item->date }}"
                                                                                data-detail="{{ json_encode($item->detail) }}"
                                                                                data-bs-target="#quick_view_modal">detail</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" align="center">No data to display
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_3">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Date</th>
                                                                <th>Expire</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Carsafe - Car Service PSD Template</td>
                                                                <td>Nov 22, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Carsafe - Car Service HTML Template</td>
                                                                <td>Nov 10, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Carsafe - Car Service WordPress Theme</td>
                                                                <td>Nov 12, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.</p>
                                                <div class="row">
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4>Billing Address <small><a href="#">edit</a></small></h4>
                                                        <address>
                                                            <p><strong>Alex Tuntuni</strong></p>
                                                            <p>1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p>Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4>Shipping Address <small><a href="#">edit</a></small></h4>
                                                        <address>
                                                            <p><strong>Alex Tuntuni</strong></p>
                                                            <p>1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p>Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_5">
                                            <div class="ltn__myaccount-tab-content-inner mb-50">

                                                @php
                                                    use App\Models\Member;
                                                    
                                                    $member = Member::where('user_id', auth()->user()->id)->first();
                                                @endphp
                                                @if ($member)
                                                    <p>Status member
                                                        <span
                                                            class="text-bold {{ $member->is_active === 0 ? 'text-danger' : 'text-primary' }}">{{ $member->is_active === 0 ? 'Inactive' : 'Active' }}</span>{{ $member->is_active === 0 ? ', please wait for admin confirmation' : '' }}
                                                    </p>
                                                    <div class="ltn__form-box">
                                                        <form action="{{ route('registerMember') }}" id="form-member"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row mb-50">
                                                                <div class="col-md-12">
                                                                    <label>Full Name:</label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $member->name }}" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label>NIK:</label>
                                                                    <input type="text" name="nik"
                                                                        value="{{ $member->nik }}" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Email:</label>
                                                                    <input type="email" name="email"
                                                                        placeholder="example@example.com"
                                                                        value="{{ $member->email }}" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Telp:</label>
                                                                    <input type="text" name="telp"
                                                                        placeholder="08212xxxx"
                                                                        value="{{ $member->telp }}" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Gender:</label>
                                                                    <br>
                                                                    <select name="gender" id="gender" disabled
                                                                        style="widows: 100%">
                                                                        <option value="laki-laki"
                                                                            {{ $member->gender == 'laki-laki' ? 'selected' : '' }}>
                                                                            Laki Laki</option>
                                                                        <option value="perempuan"
                                                                            {{ $member->gender == 'perempuan' ? 'selected' : '' }}>
                                                                            Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Image:</label>
                                                                    <img src="{{ Utils::url($member->foto) }}"
                                                                        class="img-thumbnail" alt="No Image">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label>Address:</label>
                                                                    <textarea readonly name="address" id="" cols="30" rows="10">{{ $member->address }}</textarea>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                            </div>
                                        @else
                                            <div class="ltn__form-box">
                                                <form action="{{ route('registerMember') }}" id="form-member"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row mb-50">
                                                        <div class="col-md-12">
                                                            <label>Full Name:</label>
                                                            <input type="text" name="name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>NIK:</label>
                                                            <input type="text" name="nik">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email:</label>
                                                            <input type="email" name="email"
                                                                placeholder="example@example.com">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Telp:</label>
                                                            <input type="text" name="telp" placeholder="08212xxxx">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Gender:</label>
                                                            <br>
                                                            <select name="gender" id="gender" style="widows: 100%">
                                                                <option value="laki-laki">Laki Laki</option>
                                                                <option value="perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Image:</label>
                                                            <br>
                                                            <input type="file" name="image" class="dropify"
                                                                placeholder="Input image">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Address:</label>
                                                            <textarea name="address" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                        .<div class="col-md-12">
                                                            <button type="submit"
                                                                class="btn theme-btn-1 btn-effect-1 text-uppercase">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
            </div>
        </div>
    </div>
    </div>
    <!-- WISHLIST AREA START -->
    <form action="{{ route('logout') }}" id="form-logout" method="POST">
        @csrf
    </form>
@endsection

@push('customjs')
    <script>
        function getBase64(file, input) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                $(input).val(reader.result)
            };
            reader.onerror = function(error) {
                console.log('Error: ', error);
            };
        }


        $(document).ready(function() {
            $("#form-member").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    telp: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    nik: {
                        required: true
                    },
                    image: {
                        required: true,
                    }
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },

                //add
                errorElement: 'span',
                errorClass: 'text-danger',
                errorPlacement: function(error, element) {
                    if (element.parent('.form-control').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
            })

            $(".dropify").on('change', function() {
                if ($(this).prop('files').length > 0) {
                    let file = $(this).prop('files')[0]

                    if (!file.type.toLowerCase().includes('image')) {
                        toastr.info('Files are just images')
                        $('.dropify').val('')
                    }
                } else {
                    toastr.info('Upload cancelled')
                }
            })

            $("#form-member").on('submit', function() {
                $("button[type='submit']").prop('disabled', true)
            })
        })
    </script>
@endpush
