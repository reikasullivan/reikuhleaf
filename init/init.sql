-- Blog Posts page
CREATE TABLE blogs (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  category TEXT NOT NULL,
  title TEXT NOT NULL,
  content TEXT NOT NULL,
  blog_date TEXT NOT NULL
);

INSERT INTO blogs (category, title, content, blog_date)
  VALUES ('short essays', 'Sapere Aude: Dare to Know!', 'Immanuel Kant elucidates the meaning
    of the Latin phrase “Sapere Aude”  and how we must, as a society, be courageous
     as we set forth in life to. The three loud rips as I adjust the tightness of
     the shoes in class. I look down, pretending to not notice the disturbance
     I’m causing in class.  and what’s really interesting is that I get to
     understand what it means to be free, to be free of the world’s most
     repressive ideas, visions and aspirations. People who rest and look out at
     the windowsill, yearing for a life in an alternate world. Like
     Schroedinger’s cat, the dream is both real and imaginary, the two numbers
     that make a square root are identical, yet not. There are munchies amongst
     the cats, and we aren’t afraid to show it. The ramblings of Banksy, but
     instead of expressing his thoughts through series and series and series
     of alphanumeric characters, he manifests his thoughts in the visual form
     of art. So accessible to the public, yet no one truly understands another’s
     world. \n We aren’t afraid to fight. Yet we are. It’s the everyday
     repressions. The mind is sharp, the mind is resistant. Yet the soul and
     compassion lies dormant, unwakeable. There is no fight within us that
     propels us forward; only when we are pushed to our very edges, our cliffs,
     do we act in a scramble, out of desperation. Desperation is a funny thing —
      think about bright lights and high energy, but it’s such a dark topic.
      Yet why does it appear in my mind as a clash and explosion of bright
      colors? White light? \n The tower of terror refers to our country’s
      monuments that house the very figures who frighten our land.
      There is no time like the present, they say. Act, they say.
      Be patriotic, they say. Yet there is no time like the other. \n The mind
      is resistant, the mind is powerful. Yet our will to act is not.
      The mind is resistant to brainwashing ideas, and yet our bodies are numb.
      \n We are numb. \n The world is numb. \n Dare to know!', '18 juni 2018');

INSERT INTO blogs (category, title, content, blog_date)
  VALUES ('product', 'Tommy Bahama Beach Chairs', 'Your feline guests come and
    go as they please. Sometimes they come solo, and other times, they bring
    other colorful pals and play. They leave behind some nice gifts that you
    can use as currency to purchase more food and toys for other new cats to
    come frequent your location.', '27 juli 2018');
