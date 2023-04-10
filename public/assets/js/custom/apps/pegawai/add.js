"use strict";

// Class definition
var KTModalpegawaiAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'nip': {
                        validators: {
                            notEmpty: {
                                message: 'Nama Pegawai Wajib Diisi!'
                            }
                        }
                    },
                    'nama': {
                        validators: {
                            notEmpty: {
                                message: 'Harga Pegawai Wajib Diisi!'
                            }
                        }
                    },
                    'jenis_kelamin': {
                        validators: {
                            notEmpty: {
                                message: 'Satuan Pegawai Wajib Diisi!'
                            }
                        }
                    },
                    'no_hp': {
                        validators: {
                            notEmpty: {
                                message: 'Harga Pegawai Wajib Diisi!'
                            }
                        }
                    },
                    'tempat_lahir': {
                        validators: {
                            notEmpty: {
                                message: 'Harga Pegawai Wajib Diisi!'
                            }
                        }
                    },
                    'tanggal_lahir': {
                        validators: {
                            notEmpty: {
                                message: 'Harga Pegawai Wajib Diisi!'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;

                        $.ajax({
                            type: "POST",
                            url: "/pegawai/store",
                            data: {
                                nip: form.querySelector('[name="nip"]').value,
                                nama: form.querySelector('[name="nama"]').value,
                                jenis_kelamin: form.querySelector('[name="jenis_kelamin"]').value,
                                no_hp: form.querySelector('[name="no_hp"]').value,
                                tempat_lahir: form.querySelector('[name="tempat_lahir"]').value,
                                tanggal_lahir: form.querySelector('[name="tanggal_lahir"]').value,
                                alamat: form.querySelector('[name="alamat"]').value,
                            },
                            dataType: "JSON",
                            success: function (response) {
                                submitButton.removeAttribute('data-kt-indicator');

                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    if (result.isConfirmed) {
                                        // Hide modal
                                        modal.hide();
                                        form.reset();

                                        submitButton.disabled = false;

                                        $('#kt_pegawai_table').DataTable().ajax.reload();
                                    }
                                });
                            },
                        });


                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_pegawai'));

            form = document.querySelector('#kt_modal_add_pegawai_form');
            submitButton = form.querySelector('#kt_modal_add_pegawai_submit');
            cancelButton = form.querySelector('#kt_modal_add_pegawai_cancel');
            closeButton = form.querySelector('#kt_modal_add_pegawai_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalpegawaiAdd.init();
});
