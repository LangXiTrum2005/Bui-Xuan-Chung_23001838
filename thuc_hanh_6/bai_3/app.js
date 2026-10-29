'use strict';

const { createApp } = Vue;

createApp({
  data() {
    return {
      newTask: '',
      filter: 'all',
      filters: [
        { value: 'all', label: 'Tất cả' },
        { value: 'active', label: 'Chưa hoàn thành' },
        { value: 'completed', label: 'Đã hoàn thành' }
      ],
      nextId: 4,
      tasks: [
        { id: 1, name: 'Ôn tập các directive của Vue', completed: true },
        { id: 2, name: 'Hoàn thành bài tập thực hành', completed: false },
        { id: 3, name: 'Kiểm tra giao diện trên điện thoại', completed: false }
      ]
    };
  },
  computed: {
    totalTasks() { return this.tasks.length; },
    remainingTasks() { return this.tasks.filter(task => !task.completed).length; },
    completedTasks() { return this.totalTasks - this.remainingTasks; },
    filteredTasks() {
      if (this.filter === 'active') return this.tasks.filter(task => !task.completed);
      if (this.filter === 'completed') return this.tasks.filter(task => task.completed);
      return this.tasks;
    }
  },
  methods: {
    addTask() {
      const name = this.newTask.trim();
      if (!name) return;
      this.tasks.push({ id: this.nextId++, name, completed: false });
      this.newTask = '';
    },
    deleteTask(id) { this.tasks = this.tasks.filter(task => task.id !== id); },
    clearCompleted() { this.tasks = this.tasks.filter(task => !task.completed); }
  }
}).mount('#app');
