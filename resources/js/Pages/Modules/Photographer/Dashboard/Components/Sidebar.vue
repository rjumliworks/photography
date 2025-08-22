<template>
    <div class="card shadow-none border">
        <div class="card-header bg-light-subtle">
            <div class="d-flex mb-n3">
                <div class="flex-shrink-0 me-3">
                    <div style="height:2.5rem;width:2.5rem;">
                        <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                            <i :class="plan.data.plan.icon" class="text-primary fs-24"></i>
                        </span>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h5 class="mb-0 fs-14"><span class="text-body">{{ plan.data.plan.name }}</span></h5>
                    <p class="text-muted text-truncate-two-lines fs-12">
                        <span v-if="timeLeft.total > 0">
                            {{ timeLeft.days }}d {{ timeLeft.hours }}h {{ timeLeft.minutes }}m {{ timeLeft.seconds }}s remaining
                        </span>
                        <span v-else>
                            Expired
                        </span>
                    </p>
                </div>
                <div class="flex-shrink-0"></div>
            </div>
        </div>
        <div class="card-body border-bottom bg-white">
            <p class="mb-0 text-primary fs-12 fw-semibold">Storage Status</p>
        </div>
        <div class="card bg-white border-bottom shadow-none mb-0" style="height: calc(100vh - 343px); overflow: auto;">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0"><i class="ri-database-2-line fs-17"></i></div>
                    <div class="flex-grow-1 ms-3 overflow-hidden">
                        <div class="progress mb-2 progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div><span class="text-muted fs-12 d-block text-truncate"><b>47.52</b>GB used of <b>119</b>GB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['plan'],
    data() {
        return {
            timeLeft: {
                total: 0,
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0
            },
            timer: null
        }
    },
    mounted() {
        this.updateCountdown()
        this.timer = setInterval(this.updateCountdown, 1000)
    },
    beforeUnmount() {
        clearInterval(this.timer)
    },
    methods: {
        updateCountdown() {
            const now = new Date().getTime()
            const endTime = new Date(this.plan.data.end).getTime() // 👈 use plan.end here
            const diff = endTime - now

            if (diff <= 0) {
                this.timeLeft = { total: 0, days: 0, hours: 0, minutes: 0, seconds: 0 }
                clearInterval(this.timer)
                return
            }

            this.timeLeft = {
                total: diff,
                days: Math.floor(diff / (1000 * 60 * 60 * 24)),
                hours: Math.floor((diff / (1000 * 60 * 60)) % 24),
                minutes: Math.floor((diff / (1000 * 60)) % 60),
                seconds: Math.floor((diff / 1000) % 60)
            }
        }
    }
}
</script>
