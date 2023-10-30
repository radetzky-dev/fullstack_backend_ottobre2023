<?php
// dichiarazione della classe Introspezione
class Introspezione
{
    // metodi
    public function note()
    {
        echo "Superclasse della classe Sample<br />";
    }
}
// definizione della sottoclasse Sample
class Sample extends Introspezione
{
    public function note()
    {
        echo "Classe: " . get_class($this), "<br />";
        echo "Classe di derivazione: " . get_parent_class($this), "<br />";
    }
}

if (class_exists("Sample")) {
    // istanzia un nuovo oggetto della classe Sample
    $sample = new Sample();
    $sample->note();
    if (is_subclass_of($sample, "Introspezione")) {
        echo "Sì, " . get_class($sample) . " sottoclasse di Introspezione<br />";
    } else {
        echo "No, " . get_class($sample) . " non è sottoclasse di  Introspezione<br />";
    }
}

if (class_exists("Introspezione")) {
    // istanzia un nuovo oggetto della classe Introspezione
    $intro = new Introspezione();
    echo "Classe: " . get_class($intro) . "<br />";
    $intro->note();
}
