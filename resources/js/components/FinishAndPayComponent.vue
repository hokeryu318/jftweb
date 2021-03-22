<template>

</template>

<script>
    export default {
        props: ['order_id'],
        data: function(){
            return {
                pay_status: ''
            }
        },
        mounted() {

        },
        created() {
            this.finish_page();
        },
        methods: {
            finish_page() {
                Echo.channel('finish-and-pay-channel')//public channel
                .listen('FinishAndPayEvent', (event) => {
                    if(this.order_id === event.order_id) {
                        var currentUrl = window.location.href;
                        if(currentUrl.indexOf('fix=1') !== -1) {
                            window.location.replace('/customer/index/' + event.order_id + '?table_id=' + event.table_id + '&fix=1');
                        } else {
                            window.location.replace('/customer/index/' + event.order_id + '?table_id=' + event.table_id);
                        }
                    }
                });
            },
        }
    };
</script>