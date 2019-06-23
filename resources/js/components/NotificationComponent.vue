<template>
    <ul class="nav navbar pt-0 pb-0 mt-0 mb-0 box-shadow">
        <li class="menu bg-green" id="ready_to_pay"><img :src="'/img/dollar.png'" class="noti_img" />{{ count_notification.ready_pay_count }}</li>
        <li class="menu bg-pinq" id="calling_count"><img :src="'/img/notify.png'"  class="noti_img" />{{ count_notification.attend_count }}</li>
        <li class="menu bg-yellow" id="review_count"><img :src="'/img/chat.png'"  class="noti_img" />{{ count_notification.review_count }}</li>
        <li class="menu bg-info" id="note_count"><img :src="'/img/writechat.png'"  class="noti_img" />{{ count_notification.note_count }}</li>
    </ul>
</template>

<script>
    export default {
        // props: ['count_notification'],
        data: function(){
            return {
                count_notification: []
            }
        },
        mounted() {
            axios.get('/api/CountNotification')
            .then(response => {
                this.count_notification = response.data;
            })

        },
        created() {
            Echo.channel('notification-channel')//public channel
            .listen('NotificationEvent', (event) => {
                // console.log(event.count_notification.ready_pay_count);
                this.count_notification = event.count_notification;
                // console.log(this.count_notification.ready_pay_count);
            });
        },
    };
</script>

<style scoped>

    .box-shadow {
        box-shadow: none;
    }

    .noti_img {
        width: 45px;
    }
</style>