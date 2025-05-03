<?php
function register(){ ?>
  <main class="flex items-center justify-center w-full h-screen">
      <div class="w-full px-5 md:mx-40 xl:mx-0 xl:px-0 xl:w-auto xl:ml-28">
        <h1 class="mb-16 text-xl font-bold uppercase">logo</h1>

        <div>
          <h1 class="text-3xl font-bold leading-relaxed capitalize xl:text-5xl">
            <span class="block">Welcome,</span>
            <span class="block">Create your account</span>
          </h1>
          <p class="mb-11 text-[#6b6b6b]">Hey, Let’s create some blogs!</p>
        </div>

        <form action="" method="post" class="flex flex-col gap-5">
          <input
            type="username"
            placeholder="Username"
            name="username"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />
          <input
            type="text"
            placeholder="Password"
            name="password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />
          <input
            type="text"
            placeholder="Confirm Password"
            name="password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />

          <button
            class="bg-[#8000D6] w-full xl:w-auto self-start px-7 py-3 text-white rounded-md capitalize mb-10"
            type="submit"
          >
            sign up
          </button>

          <p class="text-sm font-light text-[#6b6b6b] text-center xl:text-start">
            Already have an account?
            <a href="/login" class="font-semibold text-[#8000D6]">Sign In</a>
          </p>
        </form>
      </div>
      <div class="hidden ml-28 xl:block">
        <img
          src="../public/assets/Devices-cuate.svg"
          alt=""
          class="w-full h-full"
        />
      </div>
  </main>
<?php 
}
?>
