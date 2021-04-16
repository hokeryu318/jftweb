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
                console.log(event.table_ids);
                var table_id = this.table_id;
                var order_id = this.order_id;

                //event.table_ids.forEach( function(item) {
                //    if ( item == table_id) {
                //        window.location.replace('/customer/index/' + order_id + '?table_id=' + table_id + '&fix=1');
                //    }
                //});

                if (event.table_ids.includes(table_id)) {
                    window.location.replace('/customer/index/' + order_id + '?table_id=' + table_id + '&fix=1');
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