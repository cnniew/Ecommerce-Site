CREATE TABLE Categories (
  CategoryID VARCHAR(50),
  CategoryName VARCHAR(50),
  CreatedAt DATE,
  PRIMARY KEY (CategoryID)
);

INSERT INTO Categories VALUES
('men','Men','2024-01-01'),
('women','Women','2024-01-01'),
('unisex','Unisex','2024-01-01');

CREATE TABLE Collections (
  CollectionID VARCHAR(50),
  CollectionName VARCHAR(50),
  Description VARCHAR(100),
  ImageURL VARCHAR(500),
  CreatedAt DATE,
  PRIMARY KEY (CollectionID)
);

INSERT INTO Collections VALUES
('cozy','Cozy Comfort','Plush fabrics and soothing designs','cozy-comfort.jpg','2024-01-01'),
('urban','Urban Oasis','For the city dwellers','urban-oasis.jpg','2024-01-01'),
('fresh','Fresh Fusion','Contemporary styles and patterns','fresh-fusion.jpg','2024-01-01');

CREATE TABLE Products (
  ProductID VARCHAR(50),
  ProductName VARCHAR(50),
  Description VARCHAR(500),
  CategoryID VARCHAR(50),
  CollectionID VARCHAR(50),
  CreatedAt DATE,
  ImageURL VARCHAR(500),
  PRIMARY KEY (ProductID),
  FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID),
  FOREIGN KEY (CollectionID) REFERENCES Collections(CollectionID)
);

INSERT INTO Products VALUES
('urban-drift-bucket-hat','Urban Drift Bucket Hat','Navigate the urban jungle with our Urban Drift Bucket Hat. It''s not only trendy but also practical, offering shade from the hustle and bustle.','unisex','urban','2024-04-04','urban-drift-bucket-hat-1.jpg'),
('tangerine-mini-tote','Tangerine Mini Tote','Carry a pop of color with our Tangerine Mini Tote. Compact and vibrant, it''s the perfect accessory for the fashion-forward minimalist.','women','fresh','2024-04-03','tangerine-mini-tote-1.jpg'),
('elemental-sneakers','Elemental Sneakers','Ground your steps in style with our Elemental Sneakers. Designed with the elements in mind, they bring a natural balance to your stride and your ensemble.','unisex','fresh','2024-03-25','elemental-sneakers-1.jpg'),
('metro-hoodie','Metro Hoodie','The Metro Hoodie is your ticket to comfortable, laid-back fashion. Whether you''re on the move or taking it easy, this hoodie has got you covered.','unisex','urban','2024-03-23','metro-hoodie-1.jpg'),
('sunbeam-mules','Sunbeam Mules','Let your feet bask in the glow of our Sunbeam Mules. With their radiant style and effortless slip-on design, they''re sunshine for your step.','women','fresh','2024-03-22','sunbeam-mules-1.jpg'),
('azure-attitude-shades','Azure Attitude Shades','Step out in style with our Azure Attitude Shades, featuring a bold blue tint and modern design. These sunglasses are not just an accessory but a statement of confidence.','men','urban','2024-03-21','azure-attitude-shades-1.jpg'),
('voyager-hoodie','Voyager Hoodie','The Voyager Hoodie is for the explorer at heart. Its durable fabric and roomy pockets are perfect for those who are always searching for the next adventure.','unisex','urban','2024-03-20','voyager-hoodie-1.jpg'),
('la-baseball-hat','LA Baseball Hat','Shield your eyes and show your style with our LA Baseball Hat. It''s not just a nod to the city of angels but a capstone for any casual outfit.','unisex','fresh','2024-02-29','la-baseball-hat-1.jpg'),
('classic-canvas-tee','Classic Canvas Tee','The Classic Canvas Tee is your go-to wardrobe staple, offering unparalleled comfort and a timeless look that never goes out of style.','unisex','fresh','2024-02-26','classic-canvas-tee-1.jpg'),
('cool-neo-retro-shoes','Cool Neo-Retro Shoes','Merge past and present with our Cool Neo-Retro Shoes. Their classic silhouette with modern twists will have you walking with a foot in each era.','unisex','fresh','2024-02-20','cool-netro-retro-shoes-1.jpg'),
('city-quilted-jacket','City Quilted Jacket','Our City Quilted Jacket is the urban adventurer''s essential. With its sleek quilting and durable design, it''s ready to take on the city streets while keeping you insulated.','unisex','urban','2024-02-06','city-quilted-jacket-1.jpg'),
('autumnal-knitwear','Autumnal Knitwear','Wrap yourself in the warmth of our Autumnal Knitwear, crafted from premium wool blends to keep you cozy as the leaves change color. Perfect for chilly evenings and crisp mornings.','women','cozy','2024-01-31','autumnal-knitwear-1.jpg'),
('stepsoft-socks','StepSoft Socks','Step into luxury with our StepSoft Socks, designed to pamper your feet with every step. Their cloud-like cushioning is like a spa for your soles.','unisex','cozy','2024-01-31','stepsoft-socks-1.jpg'),
('harvest-cozy-turtleneck','Harvest Cozy Turtleneck','Cozy up in our Harvest Turtleneck, a snug embrace on a crisp day. Its rich texture and warm tones embody the essence of autumn comfort.','women','cozy','2024-01-26','harvest-cozy-turtleneck-1.jpg'),
('neutral-charm-blazer','Neutral Charm Blazer','Our Neutral Charm Blazer adds a touch of sophistication to any outfit. Its subtle hues and tailored fit make it a versatile choice for any occasion.','women','urban','2024-01-25','neutral-charm-blazer-1.jpg'),
('cute-banana-socks','Cute Banana Socks','Add a bunch of fun to your feet with our Cute Banana Socks. They''re as comfy as they are playful, perfect for lounging or peeling around town.','unisex','cozy','2024-01-14','cute-banana-socks-1.jpg'),
('canis-philosophus-linen-tee','Canis Philosophus Linen Tee','Embrace the wisdom of comfort with our Canis Philosophus Linen Tee. Made from breathable linen, this T-shirt combines classic style with a relaxed fit for the thinker on the move.','men','fresh','2024-01-08','canis-philosophus-linen-tee-1.jpg'),
('urban-bomber-jacket','Urban Bomber Jacket','The Urban Bomber Jacket is your armor against the elements. Its edgy style and robust construction make it a city dweller''s essential.','men','urban','2024-01-03','urban-bomber-jacket-1.jpg'),
('test-item','Test Item','Test item description.','women','urban','2024-01-03','voyager-hoodie-1.jpg');

CREATE TABLE Inventory (
  ProductID VARCHAR(50),
  ListPrice INT,
  Discount DOUBLE,
  DiscountPercentage INT,
  SalePrice DOUBLE,
  Sold INT NOT NULL,
  Stock INT NOT NULL,
  PRIMARY KEY (ProductID),
  FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

INSERT INTO Inventory VALUES
('autumnal-knitwear',100,NULL,10,90,35,15),
('azure-attitude-shades',45,NULL,NULL,45,65,435),
('canis-philosophus-linen-tee',50,5,NULL,45,50,50),
('city-quilted-jacket',120,NULL,10,108,25,75),
('classic-canvas-tee',25,NULL,10,22.5,100,900),
('cool-neo-retro-shoes',120,NULL,20,96,50,150),
('cute-banana-socks',20,NULL,NULL,20,65,435),
('elemental-sneakers',100,NULL,20,80,100,400),
('harvest-cozy-turtleneck',110,NULL,10,99,75,225),
('la-baseball-hat',20,NULL,NULL,20,65,435),
('metro-hoodie',90,NULL,10,81,100,300),
('neutral-charm-blazer',130,NULL,10,117,50,150),
('stepsoft-socks',25,2.5,NULL,22.5,200,10),
('sunbeam-mules',85,NULL,20,68,120,380),
('tangerine-mini-tote',150,NULL,NULL,150,65,435),
('urban-bomber-jacket',150,15,NULL,135,60,240),
('urban-drift-bucket-hat',15,NULL,NULL,15,65,435),
('voyager-hoodie',95,NULL,20,76,85,415),
('test-item',0,NULL,0,0,0,0);

CREATE TABLE ProductReviews (
  ProductID VARCHAR(50),
  UserID VARCHAR(50),
  Rating INT,
  Content VARCHAR(1000),
  CreatedAt DATE,
  FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

INSERT INTO ProductReviews VALUES
('autumnal-knitwear','dante-lancaster',4,'A bit pricey, but the quality justifies the cost. Very comfortable.','2024-04-22'),
('autumnal-knitwear','jacques-griffith',5,'Excellent warmth and comfort, ideal for chilly autumn evenings.','2024-02-14'),
('autumnal-knitwear','keith-mcneil',4,'The texture and color of this knitwear make it a standout piece in my wardrobe.','2024-03-15'),
('autumnal-knitwear','natali-craig',4,'The orange color is just as vibrant as advertised and adds a beautiful pop to my outfits. I''ve washed it a few times already, and the color hasn''t faded one bit. Definitely a must-have in your closet!','2024-04-11'),
('autumnal-knitwear','pat-barrett',5,'Love the warmth and style of this knitwear, perfect for fall weather.','2024-04-21'),
('autumnal-knitwear','sonja-fuentes',5,'So cozy and warm, the quality is top-notch. A great buy for the colder months.','2024-03-14'),
('autumnal-knitwear','tisha-foley',4,'Lovely sweater with a great fit and vibrant colors that don''t fade.','2024-02-15'),
('autumnal-knitwear','tristan-howe',3,'Nice design but the material is a bit itchy on sensitive skin.','2024-02-13'),
('azure-attitude-shades','murray-rivers',5,'Stylish and effective, these sunglasses really stand out.','2024-05-05'),
('azure-attitude-shades','tatiana-moses',3,'Look great but feel a bit flimsy.','2024-06-05'),
('azure-attitude-shades','brenton-mosley',4,'Great UV protection and very stylish, but the fit is a bit loose.','2024-05-21'),
('azure-attitude-shades','emory-bridges',3,'Chic shades but the lenses scratch too easily.','2024-05-22'),
('classic-canvas-tee','leon-case',4,'Simple yet elegant tee, soft fabric and holds up well after multiple washes.','2024-03-13'),
('classic-canvas-tee','jordyn-winters',3,'Nice shirt, but I found the fit a bit too snug for my liking.','2024-03-12'),
('classic-canvas-tee','magdalena-kim',4,'Really love the feel of this tee, though it runs a bit small after the first wash.','2024-02-09'),
('classic-canvas-tee','mikaela-stark',5,'Perfect tee for daily wear, soft material and holds up well.','2024-02-08'),
('classic-canvas-tee','vaughn-stokes',3,'Decent quality but the color faded faster than expected.','2024-02-07'),
('classic-canvas-tee','helen-norton',4,'Great for everyday wear, though the color fades after a few washes.','2024-04-25'),
('classic-canvas-tee','alison-mathis',5,'Very soft and comfortable, my new favorite tee.','2024-04-26'),
('cool-neo-retro-shoes','staci-foreman',5,'These are the coolest shoes, got so many compliments!','2024-04-29'),
('cool-neo-retro-shoes','wilmer-le',3,'Nice style but not very comfortable for long periods.','2024-04-15'),
('cool-neo-retro-shoes','gilbert-stanley',5,'Absolutely love these shoes, they are a total throwback with modern comfort.','2024-05-15'),
('cool-neo-retro-shoes','clara-hendrix',4,'Very stylish and receive lots of compliments, though a bit tight initially.','2024-05-16'),
('cute-banana-socks','gilbert-stanley',5,'Fun design and super comfy, love them!','2024-01-05'),
('cute-banana-socks','clara-hendrix',4,'Cute socks, but they thin out pretty fast.','2024-02-05'),
('cute-banana-socks','lana-rosario',5,'Super cute and fun! They brighten up my everyday outfits.','2024-05-17'),
('cute-banana-socks','ike-blackburn',3,'Good for a laugh but not the best quality, wore through quickly.','2024-05-18'),
('elemental-sneakers','pat-barrett',5,'These sneakers are not only stylish but incredibly comfortable for all-day wear.','2024-03-11'),
('elemental-sneakers','dante-lancaster',4,'Good value for money, and they look great with casual attire.','2024-03-10'),
('elemental-sneakers','alicia-shepard',4,'Great for casual walks, stylish and feels very light on the feet.','2024-02-06'),
('elemental-sneakers','rosalyn-boone',5,'Surprisingly comfortable for the price, and they look great with jeans or shorts.','2024-02-05'),
('elemental-sneakers','bryant-buckley',2,'I found them a bit stiff and uncomfortable during my first few uses.','2024-02-04'),
('elemental-sneakers','donnie-monroe',4,'Stylish and effective, perfect for my daily walks.','2024-04-27'),
('elemental-sneakers','kerry-love',3,'Good for light activities, not suitable for intensive workouts.','2024-04-28'),
('harvest-cozy-turtleneck','eldridge-craig',5,'This turtleneck is super soft and cozy, perfect for the winter season.','2024-02-03'),
('harvest-cozy-turtleneck','fidelia-dyer',4,'Keeps me warm without being too bulky, though the neck is a little tight.','2024-02-02'),
('harvest-cozy-turtleneck','dane-mosley',3,'Good sweater but started to pill after several washes.','2024-02-01'),
('harvest-cozy-turtleneck','erwin-case',5,'Fantastic quality, it''s my go-to sweater for cold days.','2024-04-29'),
('harvest-cozy-turtleneck','elise-shannon',3,'Feels nice, but the neck is too tight which is uncomfortable.','2024-04-30'),
('la-baseball-hat','brenton-mosley',4,'Great hat, fits well and keeps the sun out of my eyes.','2024-07-05'),
('la-baseball-hat','emory-bridges',5,'Perfect for sports or just a sunny day out.','2024-08-05'),
('la-baseball-hat','angelia-rubio',5,'Perfect fit and keeps the sun off my face, exactly what I wanted.','2024-05-23'),
('la-baseball-hat','donovan-stark',4,'Solid construction, but the color is less vibrant than in the photos.','2024-05-24'),
('metro-hoodie','justine-simard',5,'Super cozy and the fit is just right, great for casual wear.','2024-01-20'),
('metro-hoodie','skyler-orr',4,'Thick material that feels built to last. A bit pricey but worth it.','2024-01-19'),
('metro-hoodie','alden-kemp',5,'Amazingly warm and cozy, definitely worth the price.','2024-05-11'),
('metro-hoodie','sage-benjamin',4,'Good hoodie, but the material pills after several washes.','2024-05-12'),
('neutral-charm-blazer','angelia-rubio',5,'Elegantly tailored and fits perfectly, ideal for professional settings.','2024-01-22'),
('neutral-charm-blazer','staci-foreman',3,'Looks good but the fabric feels a bit stiff.','2024-01-21'),
('neutral-charm-blazer','darcy-mccullough',5,'Beautifully tailored, perfect for professional settings and evenings out.','2024-05-09'),
('neutral-charm-blazer','kirstin-clements',3,'The blazer is nice, but it''s tighter than I expected.','2024-05-10'),
('stepsoft-socks','lana-rosario',5,'These are the softest socks I''ve ever worn.','2024-03-05'),
('stepsoft-socks','ike-blackburn',4,'Very soft, but wish they were a bit more durable.','2024-01-29'),
('stepsoft-socks','murray-rivers',5,'Extremely soft and comfortable, great for wearing around the house.','2024-05-19'),
('stepsoft-socks','tatiana-moses',4,'Soft and cozy, but could be more durable.','2024-05-20'),
('sunbeam-mules','octavio-baldwin',4,'These mules are just fantastic – stylish yet extremely comfortable for daily wear.','2024-01-28'),
('sunbeam-mules','lorri-warf',5,'The cushioning is perfect, and they slip on so easily, great for quick outings!','2024-01-27'),
('sunbeam-mules','desiree-leblanc',4,'Great for quick outings, very chic and comfortable.','2024-05-03'),
('sunbeam-mules','darnell-hardin',2,'They look good but provide very little support.','2024-05-04'),
('tangerine-mini-tote','justine-simard',5,'Adorable and practical, fits all my essentials without being too bulky.','2024-01-26'),
('tangerine-mini-tote','chadwick-stanton',4,'Chic and vibrant, gets compliments everywhere I go.','2024-01-25'),
('tangerine-mini-tote','ismael-maxwell',5,'Perfect size for essentials, and the tangerine color is gorgeous.','2024-05-05'),
('tangerine-mini-tote','zaria-ross',4,'Chic and practical, though the material could be sturdier.','2024-05-06'),
('urban-bomber-jacket','kimberly-mastrangelo',5,'Perfect fit and excellent wind resistance, highly recommend.','2024-01-23'),
('urban-bomber-jacket','mariam-whitaker',4,'This jacket has become my go-to piece for chilly mornings, very well made.','2024-01-24'),
('urban-bomber-jacket','rosalie-ho',5,'Excellent jacket, keeps me warm and fits perfectly.','2024-05-07'),
('voyager-hoodie','lilia-mcknight',5,'I''ve worn it everywhere, super durable and fashionable.','2024-05-26'),
('voyager-hoodie','natali-craig',4,'I love the comfortable fit and stylish look of this hoodie. Perfect for chilly days out!','2024-03-11'),
('voyager-hoodie','kimberly-mastrangelo',5,'Absolutely a must-have for anyone who enjoys outdoor activities. Keeps me warm and looks great!','2024-03-10'),
('voyager-hoodie','lorri-warf',3,'Good hoodie but the color was a bit different from what I expected. Still, it''s very practical.','2024-03-09'),
('voyager-hoodie','darren-holmes',5,NULL,'2024-03-08'),
('voyager-hoodie','justine-simard',4,'Stylish and functional, this hoodie has become my go-to for chilly beach nights.','2024-03-07'),
('voyager-hoodie','emilio-vega',5,'Fantastic hoodie, offers great insulation and doesn’t sacrifice style.','2024-03-06'),
('voyager-hoodie','chadwick-stanton',4,'Really like the soft material and the lightweight feel, though it snags easily.','2024-03-05'),
('voyager-hoodie','mariam-whitaker',3,'It''s okay, serves its purpose but I wish the material was a bit softer.','2024-03-04'),
('voyager-hoodie','mila-rich',5,'This is the best hoodie I''ve purchased in a while – perfect for chilly days!','2024-03-03'),
('voyager-hoodie','harris-cullen',4,'Great quality, though a bit pricey. Still, I find it worth the cost for its durability.','2024-03-02'),
('voyager-hoodie','helen-norton',4,'Chic and practical, exactly what I needed for my winter wardrobe.','2024-03-02'),
('voyager-hoodie','alison-mathis',5,'Superb quality, fits perfectly and is incredibly warm.','2024-03-01'),
('voyager-hoodie','gemma-dotson',5,'Love it! It fits well, looks stylish, and keeps me warm.','2024-03-01'),
('voyager-hoodie','donnie-monroe',3,'Not bad but the fit was a little tight.','2024-02-28'),
('voyager-hoodie','kerry-love',5,'Absolutely perfect! I wear it everywhere I go.','2024-02-27'),
('voyager-hoodie','erwin-case',4,'Good hoodie, but I wish there were more color options.','2024-02-26'),
('voyager-hoodie','elise-shannon',5,'Love the fabric, very breathable during cooler days.','2024-02-25'),
('voyager-hoodie','keenan-potts',2,'The style is nice, but it didn’t hold up well after washing.','2024-02-24'),
('voyager-hoodie','bonita-woodward',4,'Stylish and practical, though a bit pricey.','2024-02-23'),
('voyager-hoodie','desiree-leblanc',5,'My go-to hoodie now for outdoor activities, highly recommend.','2024-02-22'),
('voyager-hoodie','darnell-hardin',3,'Looks good but the material feels a bit cheap.','2024-02-21'),
('voyager-hoodie','ismael-maxwell',5,'Excellent hoodie, great for both rain and shine.','2024-02-20'),
('voyager-hoodie','zaria-ross',4,'Really nice hoodie, but a little too bulky for my taste.','2024-02-19'),
('voyager-hoodie','rosalie-ho',5,'Perfect for beach days and very high quality.','2024-02-18'),
('voyager-hoodie','leigh-moody',3,'Decent but overpriced for what it offers.','2024-02-17'),
('voyager-hoodie','darcy-mccullough',4,'Comfortable and fashionable, though it wrinkles easily.','2024-02-16'),
('voyager-hoodie','kirstin-clements',5,'I get compliments every time I wear this hoodie.','2024-02-15'),
('voyager-hoodie','alden-kemp',4,'Great hoodie for layering, very happy with the warmth and fit.','2024-02-14'),
('voyager-hoodie','sage-benjamin',3,'Nice design but not as durable as expected.','2024-02-13'),
('voyager-hoodie','staci-foreman',5,'Awesome design, light and keeps me warm.','2024-02-12'),
('voyager-hoodie','wilmer-le',4,'Good quality, but needs more insulation for colder weather.','2024-02-11'),
('voyager-hoodie','gilbert-stanley',5,'Perfect size and great for layering.','2024-02-10'),
('voyager-hoodie','clara-hendrix',3,'Functional but not as comfortable as I hoped.','2024-02-09'),
('voyager-hoodie','lana-rosario',4,'Lovely hoodie, but the color fades after a few washes.','2024-02-08'),
('voyager-hoodie','ike-blackburn',5,'Best hoodie I’ve owned for outdoor sports.','2024-02-07'),
('voyager-hoodie','murray-rivers',4,'Light and easy to pack, great for travel.','2024-02-06'),
('voyager-hoodie','tatiana-moses',2,'Not very impressed, the fit was awkward.','2024-02-05'),
('voyager-hoodie','brenton-mosley',5,'I love this hoodie, it’s perfect for outdoor activities.','2024-02-04'),
('voyager-hoodie','emory-bridges',4,'Practical and stylish, though it snags easily.','2024-02-03'),
('voyager-hoodie','angelia-rubio',5,'A must-have for chilly days, exceptionally high quality.','2024-02-02'),
('voyager-hoodie','donovan-stark',3,'Okay hoodie but not what I expected based on the pictures.','2024-02-01'),
('voyager-hoodie','alexandra-chaney',4,'Versatile for both casual and dressier occasions.','2024-01-31'),
('voyager-hoodie','conrad-warner',4,'Provides excellent warmth and fits comfortably.','2024-01-29'),
('voyager-hoodie','blaise-macias',5,'Fantastic hoodie, got one for my whole family.','2024-01-28'),
('voyager-hoodie','daphne-whitfield',3,'Fairly good but the material is thinner than I expected.','2024-01-27'),
('voyager-hoodie','cyril-holt',4,'Versatile and easy to clean, great for daily use.','2024-01-26'),
('voyager-hoodie','tammy-reynolds',5,'Exactly what I was looking for, great fit and style.','2024-01-25'),
('voyager-hoodie','dwight-rosales',4,'Solid construction, but I wish there were more sizes.','2024-01-24'),
('voyager-hoodie','brigitte-weeks',3,'It’s alright, does the job but nothing special.','2024-01-23'),
('voyager-hoodie','elias-hull',5,'Highly recommend, especially for those who enjoy outdoor activities.','2024-01-22'),
('voyager-hoodie','jett-waller',4,'Comfortable and keeps its shape, even after washing.','2024-01-21'),
('voyager-hoodie','judith-baldwin',2,'Not very satisfied, the fit is too loose.','2024-01-20'),
('voyager-hoodie','elias-booker',5,'Excellent choice for a casual or sporty look.','2024-01-19'),
('voyager-hoodie','paloma-frazier',3,'Useful but not quite as high quality as I expected.','2024-01-18'),
('voyager-hoodie','marcellus-church',4,'Nice hoodie, good for keeping warm without being too bulky.','2024-01-17'),
('voyager-hoodie','jacqueline-coffey',5,'Love this hoodie! It’s stylish and very comfortable.','2024-01-16'),
('voyager-hoodie','melinda-sims',3,'Adequate but the color is not as vibrant in person.','2024-01-15'),
('voyager-hoodie','bryson-floyd',4,'Solid choice for those looking for a reliable hoodie.','2024-01-14'),
('voyager-hoodie','edmond-romero',5,'Terrific, lightweight, and keeps me warm in the cold.','2024-01-13'),
('voyager-hoodie','janette-mckinney',4,'Good value for the price, nicely made.','2024-01-12'),
('voyager-hoodie','winston-mann',2,'Expected better quality for the price, it''s just okay.','2024-01-11'),
('urban-drift-bucket-hat','skyler-orr',5,'Best hat I''ve ever owned. Super stylish and very durable.','2024-03-09'),
('urban-drift-bucket-hat','harriet-suarez',4,'A bit pricey, but the comfort and sun protection are definitely worth it.','2024-03-08'),
('urban-drift-bucket-hat','monika-molina',5,'Best hat for traveling, very soft and has a perfect fit.','2024-01-31'),
('urban-drift-bucket-hat','carla-sutton',4,'Loves the wide brim and functional design, but wish it came in more vibrant colors.','2024-01-30'),
('urban-drift-bucket-hat','polly-cobb',3,'Comfortable but heavier than I expected, not ideal for all weather conditions.','2024-01-29'),
('urban-drift-bucket-hat','keenan-potts',4,'Very versatile and durable, a solid choice for outdoor enthusiasts.','2024-05-01'),
('urban-drift-bucket-hat','bonita-woodward',5,'Extremely soft and fits well. Love the lightweight design.','2024-05-02');