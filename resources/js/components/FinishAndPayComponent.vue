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
                            var splits = currentUrl.split('&fix=1');
                            var parts = splits[0].split('table_id=');
                            window.location.replace('../../customer/index/' + event.order_id + '?table_id=' + parts[1] + '&fix=1');
                        } else {
                            var parts = currentUrl.split('table_id=');
                            window.location.replace('../../customer/index/' + event.order_id + '?table_id=' + parts[1]);
                        }
                    }
                });
            },
        }
    };
</script>