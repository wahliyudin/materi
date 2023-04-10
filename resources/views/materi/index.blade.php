@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .highlight {
            background-color: yellow;
            border-radius: 0 !important;
            padding: 0;
        }
    </style>
@endpush

@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Data Materi </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        Data Materi
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title w-100">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 dataTables_filter w-100">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--> <input type="search" data-kt-materi-table-filter="search"
                                class="form-control form-control-solid w-100 ps-15" placeholder="Search Materis" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar w-100">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end w-100" data-kt-materi-table-toolbar="base">
                            <!--begin::Add materi-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_materi">
                                Add Materi
                            </button>
                            <!--end::Add materi-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_materi_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Content</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Modals-->
            <!--begin::Modal - Materis - Add-->
            <div class="modal fade" id="kt_modal_add_materi" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form" action="#" id="kt_modal_add_materi_form">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_materi_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add a Materi</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div id="kt_modal_add_materi_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Content</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <textarea name="content" class="form-select form-select-solid"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Modal body-->

                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_add_materi_cancel" class="btn btn-light me-3">
                                    Discard
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_add_materi_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/materi/listing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/materi/add.js') }}"></script>
    <script>
        jQuery.fn.highlight = function(pat) {
            function innerHighlight(node, pat) {
                var skip = 0;
                if (node.nodeType == 3) {
                    var pos = node.data.toUpperCase().indexOf(pat);
                    pos -= (node.data.substr(0, pos).toUpperCase().length - node.data.substr(0, pos).length);
                    if (pos >= 0) {
                        var spannode = document.createElement('span');
                        spannode.className = 'highlight';
                        var middlebit = node.splitText(pos);
                        var endbit = middlebit.splitText(pat.length);
                        var middleclone = middlebit.cloneNode(true);
                        spannode.appendChild(middleclone);
                        middlebit.parentNode.replaceChild(spannode, middlebit);
                        skip = 1;
                    }
                } else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {
                    for (var i = 0; i < node.childNodes.length; ++i) {
                        i += innerHighlight(node.childNodes[i], pat);
                    }
                }
                return skip;
            }
            return this.length && pat && pat.length ? this.each(function() {
                innerHighlight(this, pat.toUpperCase());
            }) : this;
        };

        jQuery.fn.removeHighlight = function() {
            return this.find("span.highlight").each(function() {
                this.parentNode.firstChild.nodeName;
                with(this.parentNode) {
                    replaceChild(this.firstChild, this);
                    normalize();
                }
            }).end();
        };
        $('.dataTables_filter input').keyup(function() {
            $('#kt_materi_table td').removeHighlight();
            if ($('.dataTables_filter input').val() != "") {
                $('#kt_materi_table td').highlight($('.dataTables_filter input').val());
            }
        });
    </script>
@endpush
