<template>

    <div v-if="this.attend_status === 0" style="width:230px; background: #C9B92E" id="calling_staff">
        <img :src="'/img/calling_staff.png'" width="60px">
        <h3 style="color: white;">CALLING</h3>
    </div>
    <div v-else-if="this.attend_status === 1" style="width: 230px;" id="calling_staff">
        <img :src="'/img/call_staff.png'" width="60px" style="margin-top: 10px;">
        <h3>CALL STAFF</h3>
    </div>

</template>

<script>
    export default {
        props: ['order_id', 'calling_time'],
        data: function(){
            return {
                attend: 0,
                attend_status: 0,
                orderid: 0
            }
        },
        mounted() {

            this.orderid = this.order_id;
            if(this.calling_time != "") {
                this.attend_status = 0;
            }
            else {
                this.attend_status = 1;
            }

            // console.dir(this.attend_status);
        },
        created() {
            Echo.channel('attend-channel')//public channel
            .listen('AttendEvent', (event) => {
                this.attend = event.attend_status[0];
                console.dir(this.attend);
                console.dir(this.orderid);

                if(this.attend == this.orderid)
                {
                    // this.attend_status = 1;
                    // location.href = window.location.href;

                    document.getElementById("calling_staff").style.background = "";
                    document.getElementById("calling_staff").innerHTML = "<img src=\"/img/call_staff.png\" width=\"60px\" style=\"margin-top: 10px;\">\n" +
                        "        <h3>CALL STAFF</h3>";
                }

            });
        },
    };
</script>
