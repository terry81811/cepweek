<script src="<?php echo base_url(); ?>assets/js/order.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/bootstrapValidator.min.js"></script>
<script>
    $("#order-form-validator").bootstrapValidator({
        fields: {
            // 付款人姓名
            pay_name: {
                validators: {
                    notEmpty: {
                        message: '付款人姓名不得為空白'
                    }
                }
            },
            //付款人email
            pay_email: {
                trigger: 'blur',
                validators: {
                    notEmpty: {
                        message: '請填下您的email'
                    },
                    emailAddress: {
                        message: '請填入合法的email!'
                    }
                }
            },
            //付款人郵遞區號
            pay_post: {
                validators: {
                    numeric: {
                        message: '郵遞區號有誤'
                    }
                }
            },
            //付款人統編
            pay_tax_id: {
                validators: {
                    numeric: {
                        message: '統一編號請填寫數字'
                    }
                }
            },
            //付款人電話
            pay_phone: {
                trigger: 'blur',
                validators: {
                    phone: {
                        message: '手機號碼有誤'
                    }
                }

            },
            //收件人數量
            recNum: {
                selector: '#rec_num',
                trigger: 'blur',
                validators: {
                    numeric: {
                        message: '數量請填數字'
                    },
                    greaterThan: {
                        value: 0,
                        message: '訂購數量不得小於0'
                    }
                }
            }

        },
        submitHandler: function(validator, form, submitButton) {
            var fullName = [validator.getFieldElements('firstName').val(),
                            validator.getFieldElements('lastName').val()].join(' ');
            $('#helloModal')
                .find('.modal-title').html('Hello ' + fullName).end()
                .modal();
        }
    });

</script>