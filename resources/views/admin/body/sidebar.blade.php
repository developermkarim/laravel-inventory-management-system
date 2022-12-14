<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ Request::routeis('dashboard') ? 'active':'' }}">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('backend/assets/img/icons/dashboard.svg')}}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/icons/product.svg')}}" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('product.all') ? 'active':''}}"  href="{{ route('product.all') }}">Product List</a></li>
                        <li><a  class="{{ Request::routeis('product.add') ? 'active':'' }}"  href="{{ route('product.add') }}">Add Product</a></li>

                       {{--  <li><a href="brandlist.html">Brand List</a></li>
                        <li><a href="addbrand.html">Add Brand</a></li>
                        <li><a href="importproduct.html">Import Products</a></li>
                        <li><a href="barcode.html">Print Barcode</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-ship" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-ship" aria-label="fa fa-ship"></i><span>
                            Manage Supplier</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('supplier.all') ? 'active':'' }}"  href="{{ route('supplier.all') }}">Supplier List</a></li>

                        <li><a class="{{ Request::routeis('supplier.add') ? 'active':'' }}"  href="{{ route('supplier.add') }}">Add Supplier</a></li>


                       {{--  <li><a href="pos.html">POS</a></li>
                        <li><a href="pos.html">New Sales</a></li>
                        <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html">New Sales Return</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/icons/users1.svg')}}" alt="img"><span>
                            Manage Customer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('customer.all') ? 'active':'' }}"  href="{{ route('customer.all') }}">Customer List</a></li>

                        <li><a class="{{ Request::routeis('customer.add') ? 'active':'' }}"  href="{{ route('customer.add') }}">Add Customer</a></li>

                        <li><a class="{{ Request::routeis('customer.paid') ? 'active':'' }}"  href="{{ route('customer.paid') }}">Paid Customers</a></li>

                        <li><a class="{{ Request::routeis('customer.wise.credit.paid') ? 'active':'' }}"  href="{{ route('customer.wise.credit.paid') }}">Customer Wise Report</a></li>

                        {{-- <li><a href="#">New Sales Return</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-balance-scale" aria-hidden="true"></i><span>
                            Manage Unit</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('unit.all') ? 'active':'' }}"  href="{{ route('unit.all') }}">Unit List</a></li>

                        <li><a class="{{ Request::routeis('unit.add') ? 'active':'' }}"  href="{{ route('unit.add') }}">Add Supplier</a></li>
                      {{--   <li><a  {{ Request::routeis('') ? 'active':'' }}href="#">POS</a></li>
                        <li><a href="pos.html">New Sales</a></li> --}}


                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class=" fa fa-th-list"></i>
                        {{-- <img src="{{asset('backend/assets/img/icons/sales1.svg')}}" alt="img"> --}}<span>
                            Manage Category</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('category.all') ? 'active':'' }}"  href="{{ url('allCategories/') }}">Category List</a></li>

                        <li><a class="{{ Request::routeis('category.add') ? 'active':'' }}"  href="{{ route('category.add') }}">Add Category</a></li>
                      {{--   <li><a href="pos.html">POS</a></li>
                        <li><a href="pos.html">New Sales</a></li>
                        <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html"></a></li> --}}
                    </ul>
                </li>


                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/icons/purchase1.svg')}}" alt="img"><span>
                          Manage Purchase</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('purchase.all') ? 'active':'' }}"  href="{{ route('purchase.all') }}">Purchase List</a></li>
                        <li><a class="{{ Request::routeis('purchase.add') ? 'active':'' }}"  href="{{ route('purchase.add') }}">Add Purchase</a></li>
                        <li><a class="{{ Request::routeis('purchase.pending') ? 'active':'' }}"  href="{{ route('purchase.pending') }}">Pending Purchase</a></li>

                        <li><a class="{{ Request::routeis('purchase.daily.report') ? 'active':'' }}"  href="{{ route('purchase.daily.report') }}">Purchase Daily Report</a></li>

                    </ul>
                </li>


                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/icons/sales1.svg')}}" alt="img"><span>
                        Manage Invoice   </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('invoice.all') ? 'active':'' }}"  href="{{ route('invoice.all') }}">All Invoice</a></li>

                        <li><a class="{{ Request::routeis('invoice.add') ? 'active':'' }}"  href="{{ route('invoice.add') }}">Add Invoice</a></li>
                        <li><a class="{{ Request::routeis('invoice.pending_list') ? 'active':'' }}"  href="{{ route('invoice.pending_list') }}">Pending Invoice</a></li>
                        <li><a class="{{ Request::routeis('invoice.print.list') ? 'active':'' }}"  href="{{ route('invoice.print.list') }}">Print Invoice List</a></li>

                        <li><a class="{{ Request::routeis('invoice.daily.report') ? 'active':'' }}"  href="{{ route('invoice.daily.report') }}">Print Daily Invoice</a></li>

                        {{-- <li><a href="">POS</a></li> --}}
                       {{--  <li><a href="">New Sales</a></li>
                        <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html">New Sales Return</a></li> --}}
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend/assets/img/icons/expense1.svg')}}" alt="img"><span>
                            Manage Stock</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeis('stock.report') ? 'active':'' }}" href="{{ route('stock.report') }}">Stock Report</a></li>
                        <li><a class="{{ Request::routeis('stock.supplier.wise') ? 'active':'' }}" href="{{ route('stock.supplier.wise') }}">Spplier/Product Wise Report</a></li>
                      {{--   <li><a href="expensecategory.html">Expense Category</a></li> --}}
                    </ul>
                </li>
              {{--   <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/quotation1.svg" alt="img"><span>
                            Quotation</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="quotationList.html">Quotation List</a></li>
                        <li><a href="addquotation.html">Add Quotation</a></li>
                    </ul>
                </li> --}}
               {{--  <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span>
                            Transfer</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="transferlist.html">Transfer List</a></li>
                        <li><a href="addtransfer.html">Add Transfer </a></li>
                        <li><a href="importtransfer.html">Import Transfer </a></li>
                    </ul>
                </li> --}}
               {{--  <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span>
                            Return</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="salesreturnlist.html">Sales Return List</a></li>
                        <li><a href="createsalesreturn.html">Add Sales Return </a></li>
                        <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                        <li><a href="createpurchasereturn.html">Add Purchase Return </a></li>
                    </ul>
                </li> --}}
               {{--  <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="customerlist.html">Customer List</a></li>
                        <li><a href="addcustomer.html">Add Customer </a></li>
                        <li><a href="supplierlist.html">Supplier List</a></li>
                        <li><a href="addsupplier.html">Add Supplier </a></li>
                        <li><a href="userlist.html">User List</a></li>
                        <li><a href="adduser.html">Add User</a></li>
                        <li><a href="storelist.html">Store List</a></li>
                        <li><a href="addstore.html">Add Store</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/places.svg" alt="img"><span>
                            Places</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="newcountry.html">New Country</a></li>
                        <li><a href="countrieslist.html">Countries list</a></li>
                        <li><a href="newstate.html">New State </a></li>
                        <li><a href="statelist.html">State list</a></li>
                    </ul>
                </li> --}}
               {{--  <li>
                    <a href="components.html"><i data-feather="layers"></i><span> Components</span> </a>
                </li> --}}
            {{--     <li>
                    <a href="blankpage.html"><i data-feather="file"></i><span> Blank Page</span> </a>
                </li> --}}
            {{--     <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages
                        </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li> --}}
               {{--  <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li> --}}
              {{--   <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html">Form Mask </a></li>
                        <li><a href="form-validation.html">Form Validation </a></li>
                        <li><a href="form-select2.html">Form Select2 </a></li>
                        <li><a href="form-fileupload.html">File Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                            Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="email.html">Email</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/time.svg" alt="img"><span>
                            Report</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="purchaseorderreport.html">Purchase order report</a></li>
                        <li><a href="inventoryreport.html">Inventory Report</a></li>
                        <li><a href="salesreport.html">Sales Report</a></li>
                        <li><a href="invoicereport.html">Invoice Report</a></li>
                        <li><a href="purchasereport.html">Purchase Report</a></li>
                        <li><a href="supplierreport.html">Supplier Report</a></li>
                        <li><a href="customerreport.html">Customer Report</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                            Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="newuser.html">New User </a></li>
                        <li><a href="userlists.html">Users List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg" alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="generalsettings.html">General Settings</a></li>
                        <li><a href="emailsettings.html">Email Settings</a></li>
                        <li><a href="paymentsettings.html">Payment Settings</a></li>
                        <li><a href="currencysettings.html">Currency Settings</a></li>
                        <li><a href="grouppermissions.html">Group Permissions</a></li>
                        <li><a href="taxrates.html">Tax Rates</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
