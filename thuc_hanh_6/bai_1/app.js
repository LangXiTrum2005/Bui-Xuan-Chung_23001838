'use strict';

const { createApp } = Vue;

createApp({
  data() {
    return {
      student: {
        id: '23001838',
        name: 'Bùi Xuân Chung',
        className: 'Lớp Công nghệ thông tin',
        avatar: 'student-avatar.svg',
        avatarAlt: 'Ảnh đại diện minh họa của sinh viên Bùi Xuân Chung',
        gpa: 8.2,
        isStudying: true,
        introduction: 'Xin chào! Mình là sinh viên yêu thích lập trình web và đang học cách xây dựng giao diện tương tác với Vue.js.'
      },
      showIntro: false
    };
  },
  computed: {
    formattedGpa() {
      return Number(this.student.gpa).toLocaleString('vi-VN', { maximumFractionDigits: 2 });
    },
    gradeLabel() {
      const score = Number(this.student.gpa);
      if (score >= 8) return 'Giỏi';
      if (score >= 6.5) return 'Khá';
      if (score >= 5) return 'Trung bình';
      return 'Chưa đạt';
    },
    gradeClass() {
      return { 'Giỏi': 'grade-excellent', 'Khá': 'grade-good', 'Trung bình': 'grade-average', 'Chưa đạt': 'grade-low' }[this.gradeLabel];
    }
  }
}).mount('#app');
