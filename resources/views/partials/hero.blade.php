<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Znajdź
                        <br></strong>swój wymarzony pokój</h1>
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Znajdź świetne miejsca na nocleg,
                    jedzenie, relaks</p>
                <div class="block-17 my-4">
                    <form action="{{ route('room.index') }}" method="get" class="d-block d-flex">
                        <div class="fields d-block d-flex">
                            <div class="textfield-search">
                                <input type="text" class="form-control" name="text" placeholder="Wpisz nazwę pokoju ...">
                            </div>  
                        </div>
                        <input type="submit" class="search-submit btn btn-primary" value="Szukaj">
                    </form>
                </div>
                <p class="browse d-md-flex">
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i
                                class="flaticon-fork"></i>Basen</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i
                                class="flaticon-hotel"></i>Drinki</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i
                                class="flaticon-meeting-point"></i>Wyżywienie</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i
                                class="flaticon-shopping-bag"></i>Zwierzęta</a></span>
                </p>
            </div>
        </div>
    </div>
</div>
