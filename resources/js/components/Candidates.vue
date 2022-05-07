<template>
  <div>
    <div class="p-10">
      <h1 class="text-4xl font-bold">Candidates</h1>
    </div>
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
      <div
        v-for="candidate in candidates"
        class="rounded overflow-hidden shadow-lg"
        :key="candidate.id"
      >
        <img
          class="w-full"
          src="/avatar.png"
          alt=""
        />
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">
            {{ candidate.name }}
          </div>
          <p class="text-gray-700 text-base">
            {{ candidate.description }}
          </p>
        </div>
        <div class="px-6 pt-4 pb-2">
          <span
            v-for="strength in JSON.parse(candidate.strengths)"
            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
            :key="strength.id"
          >
            {{ strength }}
          </span>
        </div>
        <div class="p-6 float-right">
          <button
            class="bg-white text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow disabled:opacity-50"
            :class="{ 'hover:bg-gray-100': candidate.ableToContact }"
            v-on:click.stop.prevent="contact(candidate.id)"
            :disabled="!candidate.ableToContact"
          >
            {{ candidate.ableToContact ? 'Contact' : 'Contacted' }}
          </button>
          <button
            class="bg-white text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow disabled:opacity-50"
            :class="{ 'hover:bg-teal-100': candidate.ableToHire }"
            v-on:click.stop.prevent="hire(candidate.id)"
            :disabled="candidate.ableToContact || !candidate.ableToHire"
          >
            {{ candidate.ableToContact || candidate.ableToHire ? 'Hire' : 'Hired' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['candidates'],
    methods: {
      contact(id) {
        window.axios
          .post(`/candidates/${id}/contact`)
          .then((res) => {
            console.log(res);
            location.reload();
          })
          .catch((err) => {
            alert(err.response.data?.message ?? err.message);
          });
      },
      hire(id) {
        window.axios
          .patch(`/candidates/${id}/hire`)
          .then((res) => {
            console.log(res);
            location.reload();
          })
          .catch((err) => {
            alert(err.response.data?.message ?? err.message);
          });
      },
    },
  };
</script>
