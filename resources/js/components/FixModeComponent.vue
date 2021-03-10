<template>

</template>

<script>
    export default {
        name:"FixMode",
        props: ['table_id'],
        data: function(){
            return {
                order_id: ''
            }
        },
        mounted() {

        },
        created() {
            Echo.channel('fixmode-channel')//public channel
            .listen('FixModeEvent', (event) => {
                this.order_id = event.order_id;
                console.log(this.order_id);

                window.location.replace('/customer/index/' + this.order_id + '?table_id=' + this.table_id + '&fix=1');
            });
        },
    };
</script>

<style scoped>

    .box-shadow {
        box-shadow: none;
    }
</style>