'use strict';

const { createApp } = Vue;

createApp({
  data() {
    return {
      name: '',
      showtimes: ['09:00 · Thứ Sáu', '14:30 · Thứ Sáu', '19:30 · Thứ Sáu'],
      showtime: '09:00 · Thứ Sáu',
      ticketType: 'standard',
      quantity: 1,
      withCombo: false,
      confirmation: null
    };
  },
  computed: {
    ticketPrice() { return this.ticketType === 'vip' ? 100000 : 70000; },
    comboPrice() { return this.withCombo ? 45000 : 0; },
    validQuantity() { return Number.isInteger(this.quantity) && this.quantity >= 1 && this.quantity <= 10; },
    total() { return this.validQuantity ? this.ticketPrice * this.quantity + this.comboPrice : 0; },
    canBook() { return this.name.trim().length > 0 && this.validQuantity; }
  },
  methods: {
    money(value) { return new Intl.NumberFormat('vi-VN').format(value) + ' đ'; },
    increaseQuantity() { if (this.validQuantity && this.quantity < 10) this.quantity += 1; },
    decreaseQuantity() { if (this.validQuantity && this.quantity > 1) this.quantity -= 1; },
    resetForm() {
      this.name = '';
      this.showtime = this.showtimes[0];
      this.ticketType = 'standard';
      this.quantity = 1;
      this.withCombo = false;
      this.confirmation = null;
    },
    submitBooking() {
      if (!this.canBook) return;
      this.confirmation = {
        name: this.name,
        showtime: this.showtime,
        quantity: this.quantity,
        ticketLabel: this.ticketType === 'vip' ? 'VIP' : 'thường',
        withCombo: this.withCombo,
        total: this.total
      };
    }
  }
}).mount('#app');
