<template>
  <main>
    <section>
      <div
        class="w-full bg-center bg-cover h-[38rem] relative"
        style="
          background-image: url('https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80');
        "
      >
        <div
          class="flex items-center justify-center w-full h-full bg-gray-900/40"
        >
          <div class="text-center">
            <h1 class="text-3xl font-semibold text-white lg:text-4xl">
              I <span class="text-secondary">Migliori</span> a portata di click!
            </h1>
            <button class="btn btn-primary mt-14">Unisciti a loro</button>
          </div>
        </div>
        <div
          class="
            flex
            items-center
            justify-center
            absolute
            bottom-0
            left-10
            right-10
          "
        >
          <!-- <div
            v-for="(information, index) in information"
            :key="index"
            class="
              bg-black bg-opacity-30
              rounded-md
              flex flex-col
              items-center
              justify-center
              w-full
            "
          >
            <p class="px-10 text-white text-4xl pt-2">{{ information.info }}</p>
            <p class="px-10 text-white text-8xl pb-5">
              {{ information.numericInfo }}
            </p>
          </div> -->
        </div>
      </div>
    </section>
    <!--TEAM-->

    <section class="bg-white mt-7">
      <div class="container px-6 py-10 mx-auto">
        <h1
          class="
            text-3xl
            font-semibold
            text-center text-gray-800
            capitalize
            lg:text-4xl
          "
        >
          Conosci i nostri migliori
          <span class="text-secondary">Professionisti</span>
        </h1>
        <p class="max-w-2xl mx-auto my-6 text-center text-gray-500">
          Pieni di passione ed energia i nostri professionisti sanno che ci?? che
          fanno e che il loro lavoro ha un impatto sulla vita quotidiana delle
          persone.
        </p>

        <!--TEAM GRID-->
        <div
          class="
            grid grid-cols-1
            gap-8
            mt-8
            xl:mt-16
            md:grid-cols-2
            xl:grid-cols-3
            items-center
            justify-center
          "
        >
          <div
            v-for="(freelancers, index) in freelancers"
            :key="index"
            class="
              flex flex-col
              items-center
              opacity-75
              hover:opacity-100 hover:duration-1000
            "
          >
            <img
              class="team object-cover w-full rounded-xl aspect-square"
              :src="freelancers.image"
              alt=""
            />

            <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize">
              {{ freelancers.freelancer }}
            </h1>
            <p class="mt-2 text-secondary capitalize">
              {{ freelancers.profession }}
            </p>
            <div class="flex mt-3 -mx-2">
              <a
                href="#"
                class="
                  mx-2
                  text-gray-600
                  transition-colors
                  duration-300
                  base-300
                  hover:text-primary
                "
                aria-label="Reddit"
              >
                <svg
                  class="w-6 h-6 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"
                  ></path>
                </svg>
              </a>

              <a
                href="#"
                class="
                  mx-2
                  text-gray-600
                  transition-colors
                  duration-300
                  base-100
                  hover:text-primary
                "
                aria-label="Facebook"
              >
                <svg
                  class="w-6 h-6 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"
                  ></path>
                </svg>
              </a>

              <a
                href="#"
                class="
                  mx-2
                  text-gray-600
                  transition-colors
                  duration-300
                  base-100
                  hover:text-primary
                "
                aria-label="Github"
              >
                <svg
                  class="w-6 h-6 fill-current"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"
                  ></path>
                </svg>
              </a>
            </div>
          </div>
          <!--JOIN TEAM-->
          <div class="flex flex-col items-center transition-none">
            <img
              class="object-cover w-full rounded-xl aspect-square"
              src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
              alt=""
            />
            <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize">
              Il prossimo potresti essere
              <span class="text-secondary">tu!</span>
            </h1>
            <p class="mt-2 text-secondary capitalize">
              {{ freelancers.profession }}
            </p>
            <div class="flex mt-3 -mx-2">
              <button class="btn btn-primary">Registrati Subito</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--REVIEW-->
    <section class="bg-base-200 mt-7">
      <div class="container px-6 pt-10 pb-7 mx-auto">
        <h1
          class="
            text-3xl
            font-semibold
            text-center
            capitalize
            lg:text-4xl
            base-100
          "
        >
          Scopri cosa dicono i tuoi <span class="text-secondary">clienti</span>
        </h1>

        <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 base-100">
          Resta sempre sul pezzo grazie alle recensioni lasciate dagli utenti
          che ti contattano. Monitora costantemente i loro feedback e migliora
          di conseguenza il tuo lavoro.
        </p>
        <div
          class="
            grid grid-cols-1
            gap-8
            mx-auto
            mt-8
            lg:grid-cols-2
            xl:mt-10
            max-w-7xl
          "
        >
          <div v-for="(reviews, index) in reviews" :key="index" class="h-full">
            <div class="p-6 bg-gray-100 rounded-lg md:p-8 h-full">
              <p class="leading-loose text-gray-500 base-100">
                ???{{ reviews.review }}???.
              </p>
              <h1 class="font-semibold text-secondary">
                {{ reviews.userName }}
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Q&A-->
    <section class="qa bg-base-200 py-5">
      <div class="text-center">
        <h1
          class="
            text-3xl
            font-semibold
            text-center text-gray-800
            capitalize
            lg:text-4xl
            py-10
          "
        >
          Domande Frequenti
        </h1>
      </div>
      <!--Q&A CONTAINER-->
      <div class="container mx-auto md:h-80">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full relative">
          <!--Q&A BOX-->
          <div v-for="(faq, index) in faqs" :key="index">
            <div
              tabindex="0"
              class="
                collapse collapse-arrow
                border border-base-300
                bg-base-100
                rounded-box
              "
            >
              <div class="collapse-title text-xl font-medium">
                {{ faq.question }}
              </div>
              <div class="collapse-content">
                <p>{{ faq.answer }}</p>
              </div>
            </div>
          </div>
          <button class="btn btn-primary">
            La tua domanda non ?? in elenco?
          </button>
          <button class="btn btn-primary">Contattaci</button>
        </div>
      </div>
    </section>
    <!--REGISTER-->
    <section class="mb-40">
      <div class="max-w-3xl px-6 py-16 mx-auto text-center">
        <h1
          class="
            text-3xl
            font-semibold
            text-center text-gray-800
            capitalize
            lg:text-4xl
            pt-10
          "
        >
          Registrati e inizia <span class="text-secondary">oggi</span> a
          ricevere clienti
        </h1>
        <div
          class="
            flex flex-col
            mt-8
            space-y-3
            sm:space-y-0 sm:flex-row sm:justify-center sm:-mx-2
          "
        >
          <input
            id="email"
            type="text"
            class="
              px-4
              py-2
              text-black
              bg-white
              border
              rounded-md
              sm:mx-2
              base-content
              focus:border-blue-400
              focus:outline-none
              focus:ring
              focus:ring-blue-300
              focus:ring-opacity-40
            "
            placeholder="Email Address"
          />

          <button class="btn btn-primary">Inizia Subito!</button>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  data: () => ({
    information: [
      {
        info: "Informazione1",
        numericInfo: "8888k",
      },
      {
        info: "Informazione2",
        numericInfo: "9999k",
      },
      {
        info: "Informazione3",
        numericInfo: "7777k",
      },
    ],
    freelancers: [
      {
        freelancer: "Valerio",
        profession: "Full-Stack Developer",
        image: "/assets/team-valerio.png",
      },
      {
        freelancer: "Hugo",
        profession: "Full-Stack Developer",
        image: "/assets/team-hugo.png",
      },
      {
        freelancer: "Francesco Gentile",
        profession: "Full-Stack Developer",
        image: "/assets/team-franco.png",
      },
      {
        freelancer: "Eli Golam",
        profession: "Full-Stack Developer",
        image: "/assets/team-mahfuzul.png",
      },
      {
        freelancer: "Carmelo",
        profession: "Back-End Developer",
        image: "/assets/team-carmelo.png",
      },
    ],
    reviews: [
      {
        review:
          "Ho trovato il sito di freelancers online perfetto per le mie esigenze! La selezione di professionisti ?? davvero ampia e ho trovato facilmente un freelancer che ?? stato in grado di soddisfare le mie richieste. La piattaforma ?? facile da usare e il supporto clienti ?? sempre stato molto disponibile e attento alle mie necessit??. Consiglio vivamente questo sito a chiunque abbia bisogno di servizi di freelancing di alta qualit??!",
        propic: "image",
        userName: "Piermartina Feliciotta",
        profession: "Professional",
      },
      {
        review:
          "Ho utilizzato questo sito per trovare un freelancer per un progetto importante e sono rimasta davvero soddisfatta del risultato. La selezione di professionisti ?? davvero ampia e ho trovato facilmente un freelancer che ha soddisfatto le mie aspettative. La piattaforma ?? facile da usare e il supporto clienti ?? sempre stato molto disponibile e attento alle mie necessit??. Consiglio vivamente questo sito a chiunque abbia bisogno di servizi di freelancing di alta qualit??!",
        propic: "image",
        userName: "Carloantonio De Pacis",
        profession: "Researcher",
      },
      {
        review:
          "Io su freelanceboard ho trovato un cliente appena mi sono iscritto, magari sar?? stato fortunato, ma onestamente penso che abbia influito molto il fatto che ho potuto parlare con il cliente ancora prima di fargli la mia offerta.",
        propic: "image",
        userName: "Gianfelice Tristino",
        profession: "Developer",
      },
      {
        review:
          "Sono iscritta su Boover da un paio di anni, e sono molto soddisfatta della collaborazione. Ovviamente ?? un secondo lavoro per me, ma mi ha permesso di pagarmi gli studi e affrontare le emergenze economiche. Sono puntuali, meticolosi, e l'impegno che metti ripaga. Consigliato!",
        propic: "image",
        userName: "Sara Stanca",
        profession: "Student",
      },
    ],
    faqs: [
      {
        question: "Come posso diventare freelance su questo sito?",
        answer:
          "Per diventare freelance su questo sito, ?? necessario creare un account e compilare il tuo profilo con informazioni sulla tua esperienza e le tue competenze. Una volta che il tuo profilo ?? completo, potrai iniziare a cercare opportunit?? di lavoro e candidarti per i progetti che ti interessano.",
      },
      {
        question: "Come posso trovare lavoro come freelance su questo sito?",
        answer:
          "Ci sono diversi modi per trovare lavoro come freelance su questo sito. Potrai cercare progetti specifici utilizzando i filtri di ricerca, inviare candidature spontanee ai clienti che cercano freelancer con le tue competenze, o utilizzare le funzionalit?? di matching per trovare opportunit?? di lavoro in base alle tue preferenze e al tuo profilo.",
      },
      {
        question: "Quanto mi costa?",
        answer:
          "Dipende soltanto da te! Puoi lavorare liberamente quanto ritieni opportuno per le tue esigenze. Molti freelancers lavorano su Boover full-time, mentre altri lo sfruttano come piattaforma di lavoro part-time per avere delle entrate extra.",
      },
      {
        question:
          "Come posso inviare una candidatura per un progetto come freelance?",
        answer:
          "Per inviare una candidatura per un progetto come freelance, dovrai accedere al tuo account e cercare il progetto che ti interessa. Una volta trovato il progetto, potrai inviare la tua candidatura cliccando sul pulsante Candidati per questo progetto e seguendo le istruzioni indicate. Assicurati di fornire tutte le informazioni richieste e di caricare il tuo CV o il tuo portfolio per presentare le tue competenze e la tua esperienza.",
      },
      {
        question: "Come vengo pagato?",
        answer:
          "Una volta che hai completato un accordo di collaborazione, i soldi percepiti vengono direttamente versati sul tuo saldo Boover. In qualsiasi momento puoi collegare il tuo conto corrente al profilo Boover per effettuare spostamenti di denaro senza particolari vincoli!",
      },
      {
        question: "Quanto tempo devo investire su Boover?",
        answer:
          "Dipende interamente dalle tue esigenze! Ogni freelancer su Boover non ha alcun tipo di vincolo sulla gestione della propria disponibilit?? e sui tempi di lavoro.",
      },
    ],
  }),

  mounted() {
    console.log(this.$parent.$refs.navbar);
    this.$parent.$refs.navbar.toggleShowOnZero(false);
    this.$parent.$refs.navbar.toggleCategoriesOnZero(false);
    this.$parent.paddingHandling(false, 1000);
  },
  beforeDestroy() {
    this.$parent.$refs.navbar.toggleShowOnZero(true);
    this.$parent.$refs.navbar.toggleCategoriesOnZero(true);
  },
};
</script>
<style lang="scss" scoped>
img {
  max-width: 60%;
  height: auto;
}
</style>
