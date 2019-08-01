@extends(SITE_THEME.'.shop_layout')

@section('main')
<section >
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img width="100%" src="/documents/rect2522.png" alt="">
        </div>
       <div class="col-md-9">
           
            <p class="heading text-center">Vendre ce produit</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex molestias, quam, delectus possimus earum laboriosam fugit modi architecto omnis reprehenderit nisi neque officiis eveniet molestiae? Exercitationem quos nesciunt voluptatem quibusdam?</p>
           <p><div class="520">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia itaque architecto officiis, consectetur esse ratione numquam sequi voluptatibus molestiae eveniet voluptates consequatur pariatur? Quasi natus tempora culpa, illum perferendis distinctio!</div></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis similique ipsum velit. Nobis facere beatae deleniti illo ducimus sit blanditiis? Possimus magni nostrum dignissimos est. Modi cupiditate odit numquam neque amet esse mollitia qui debitis eveniet vel inventore natus excepturi molestias ex quas explicabo provident dolor illum, laboriosam distinctio temporibus ad. Voluptatum consectetur totam pariatur provident similique praesentium cum sequi perferendis reiciendis. Nostrum dolor quisquam error reprehenderit, est, eum voluptas necessitatibus nemo, rem beatae facere ullam? Consequatur maxime quo ipsum iusto odit quia nobis consectetur, perferendis ea amet. Quae maxime ullam consequatur placeat voluptas perferendis cumque, maiores autem esse quod.

            </p>
                    <p class="heading text-center">Kirshop Algérie  </p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum quae magni amet in, nisi cum itaque commodi dolorum quidem, a maiores? Atque at perspiciatis placeat repellendus sint cum facilis dolorem accusamus esse doloremque eaque laudantium id odio, veritatis voluptatum iure sequi sapiente dolore neque quam molestias unde deleniti earum officiis? Praesentium inventore illo minus vero ea sapiente iusto nesciunt fugit quod magnam porro atque, ullam aperiam accusamus quas molestias omnis necessitatibus culpa hic! Explicabo, accusantium magnam! Quibusdam quae dolorum minima?</p>
        </div>
    </div>
</div>
</section>
@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">{{ $title }}</li>
        </ol>
      </div>
@endsection
