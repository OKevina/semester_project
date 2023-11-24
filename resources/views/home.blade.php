@extends('layouts.layout')

@section('content')

    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Travel and Tourism</h1>
            <p>We are delighted to have you here and excited to be your gateway to a world of unforgettable adventures and remarkable destinations. Whether you're seeking sandy beaches, majestic mountains, vibrant cities, or cultural experiences, our website is designed to inspire and assist you in planning your next remarkable journey. Explore our diverse collection of destinations, discover helpful travel tips, and let your wanderlust guide you to extraordinary experiences. Get ready to embark on an incredible travel journey and create memories that will last a lifetime. Welcome aboard!</p>
            <a href="{{ url('views/destination/index') }}" class="cta-button">Explore Now</a>
        </div>
    </section>

    <section class="destination-section">
        <h2>Popular Destinations</h2>
        <div class="destination-grid">
            <div class="destination-card">
                <img src="/images/hawaii.jpg" alt="Destination 1">
                <h3>HAWAII</h3>
                <p>Hawaii is a captivating destination known for its stunning beaches, lush landscapes, and rich culture. With crystal-clear waters and golden sands, the beaches offer a paradise for water activities like snorkeling, surfing, and swimming. Explore tropical rainforests, majestic waterfalls, and active volcanoes in the national parks. Immerse yourself in Hawaiian culture through traditional ceremonies, hula dances, and delicious island cuisine. Choose from a variety of accommodations and indulge in fresh seafood and tropical fruits. Hawaii offers relaxation, adventure, and a vibrant local experience.</p>
            </div>
            <div class="destination-card">
                <img src="/images/seychelles.jpg" alt="Destination 2">
                <h3>SEYCHELLES</h3>
                <p>Seychelles is an idyllic archipelago located in the Indian Ocean, renowned for its pristine beaches, turquoise waters, and abundant marine life. This paradise destination is perfect for relaxation, water sports, and nature exploration. Visit world-famous beaches like Anse Lazio and Anse Source d'Argent, where powdery white sands meet crystal-clear waters. Snorkel or dive in vibrant coral reefs, spotting colorful fish, turtles, and even whale sharks. Explore nature reserves and lush rainforests, home to unique flora and fauna, including the rare coco de mer palm. Experience the warm hospitality of the Seychellois people and indulge in delicious Creole cuisine. Seychelles offers a true escape to a tropical paradise.</p>
            </div>
            <div class="destination-card">
                <img src="/images/helsinki.jpg" alt="Destination 3">
                <h3>HELSINKI</h3>
                <p>Helsinki is the vibrant capital of Finland, situated on the shores of the Baltic Sea. This modern city seamlessly combines nature and urban life. Explore its unique architecture, from neoclassical buildings to modern masterpieces like the iconic Helsinki Cathedral. Experience Finnish sauna culture, visit bustling marketplaces, and enjoy local delicacies such as reindeer dishes and fresh salmon. Discover the city's rich cultural scene through its museums, art galleries, and design districts. With its beautiful parks, islands, and waterfront promenades, Helsinki offers a perfect balance of city adventures and natural beauty.</p>
            </div>
            <div class="destination-card">
                <img src="/images/newzealand.jpg" alt="Destination 4">
                <h3>NEW ZEALAND</h3>
                <p>New Zealand, located in the southwestern Pacific Ocean, is a captivating destination renowned for its stunning natural landscapes and rich Maori culture. From majestic mountains and pristine lakes to lush forests and picturesque coastline, New Zealand offers a diverse range of experiences for outdoor enthusiasts and adventure seekers. Immerse yourself in the fascinating Maori heritage, explore vibrant cities like Auckland and Wellington, and discover the enchanting filming locations of famous movie trilogies such as "The Lord of the Rings" and "The Hobbit." With warm hospitality and breathtaking beauty, New Zealand is an unforgettable journey for all travelers.</p>
            </div>

    </section>
    <!-- Your custom content ends here -->
@endsection
