<!DOCTYPE html>
<?php include('./includes/header.php'); ?>
       
      <main class="px-12 px-24 mt-24">
          <h1 class="text-3xl font-bold text-center uppercase text-yellow-500">contact us</h1>
          <div class="mt-8 md:flex md:justify-around items-center">
          <div class="mr-8">
          <section>
                    <h2 class="text-2xl text-yellow-500 mb-1">Address</h2>
                    <p class="text-lg md:text-xl">
                     Block 18A & 18Bb The Secretariat,<br>
                        Obafemi-Awolowo Way,. <br>
                        Alausa, Ikeja, Lagos.
                    </p>
                </section>
                <section class="mt-2">
                    <h2 class="text-2xl text-yellow-500 mb-1">Phone</h2>
                    <p class="text-lg md:text-xl">01-8169346</p>
                </section>
                <section class="mt-2">
                    <h2 class="text-2xl text-yellow-500 mb-1">E-mail</h2>
                    <p class="text-lg md:text-xl">scitech@lagosstate.gov.ng</p>
                </section> 
          </div>
          <div>
              <form action="" class=" w-80 md:w-96">
                  <input type="text" class="py-3 px-3 border-l-2 w-full border-yellow-500 block rounded-lg" name="fullName" placeholder="Full name">
                  <input type="email"  class="py-3 px-3 mt-3 w-full border-l-2 border-yellow-500 block rounded-lg" name="email" placeholder="Email address">
                  <textarea name="" class="py-3 px-3 mt-3 w-full border-l-2 border-yellow-500 block rounded-lg" cols="30" rows="4" name="message" placeholder="Write message here"></textarea>
                  <input type="submit" value="Submit" class="py-3 border-l-2 border-white block mt-3 bg-yellow-500 text-gray-800 w-24 rounded-lg mx-auto text-center">
              </form>
          </div>
          </div>
      </main>
  </body>
  </html>