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
            Echo.channel('pay-channel')//public channel
            .listen('PayEvent', (event) => {
                this.pay_status = event.pay_status;

                if(this.pay_status === 'pay_'+this.order_id) {
                    var currentUrl = window.location.href;
                    if(currentUrl.indexOf('fix=1') !== -1) {
                        var splits = currentUrl.split('&fix=1');
                        var parts = splits[0].split('table_id=');
                        window.location.replace('/customer/welcome?table_id=' + parts[1]);
                    } else {
                        window.location.replace('../../');
                    }
                }
            });
        },
    };
</script>

<style scoped>

    .box-shadow {
        box-shadow: none;
    }
</style>