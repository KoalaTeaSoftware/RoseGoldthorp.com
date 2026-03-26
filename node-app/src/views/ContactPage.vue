<script setup>
import { ref, computed } from 'vue'

const maxNameLength = 40
const maxEmailLength = 254
const maxSubjectLength = 100
const msgMinLen = 10
const msgMaxLen = 500

const name = ref('')
const email1 = ref('')
const email2 = ref('')
const subject = ref('')
const message = ref('')
const submitted = ref(false)
const submissionResult = ref('')
const emailMismatch = ref(false)

const charsLeft = computed(() => msgMaxLen - message.value.length)

function checkEmails() {
  emailMismatch.value = email1.value !== '' && email2.value !== '' && email1.value !== email2.value
}

function handleSubmit() {
  if (emailMismatch.value) return
  // TODO: Replace with Firebase Function call
  submitted.value = true
  submissionResult.value = 'Thank you for your message!'
}
</script>

<template>
  <div id="contact">
    <template v-if="submitted">
      <p class="text-success display-4 text-center p-5">{{ submissionResult }}</p>
    </template>

    <template v-else>
      <h1>Contact Me</h1>
      <p>If you don't already know my email, please write to me using this form (please use all fields)</p>

      <form @submit.prevent="handleSubmit">
        <div class="mb-3">
          <input required v-model="name" type="text"
                 :maxlength="maxNameLength"
                 placeholder="Please tell me your name"
                 class="form-control">
        </div>
        <div class="mb-3">
          <input required v-model="email1" type="email"
                 :maxlength="maxEmailLength"
                 placeholder="Please enter your email address"
                 @blur="checkEmails"
                 class="form-control"
                 :class="{ erroneousField: emailMismatch }">
        </div>
        <div class="mb-3">
          <input required v-model="email2" type="email"
                 :maxlength="maxEmailLength"
                 placeholder="Please re-enter your email"
                 @blur="checkEmails"
                 class="form-control"
                 :class="{ erroneousField: emailMismatch }">
        </div>
        <div class="mb-3">
          <input required v-model="subject" type="text"
                 :maxlength="maxSubjectLength"
                 placeholder="RE: something ..."
                 class="form-control">
        </div>
        <div class="mb-3">
          <label class="w-100">Your Message: (chars left: <span>{{ charsLeft }}</span>)
            <textarea required v-model="message"
                      :minlength="msgMinLen" :maxlength="msgMaxLen"
                      rows="5"
                      class="form-control"></textarea>
          </label>
        </div>
        <button class="btn brandedButton" type="submit" style="font-size: x-large">Send</button>
      </form>
    </template>
  </div>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

#contact {
  .erroneousField {
    border-color: $banner-text;
    color: $banner-text;
  }

  input, textarea {
    border-color: $banner-text;
  }
}
</style>
