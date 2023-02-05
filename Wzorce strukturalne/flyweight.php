public class Tree {

    private static final Long numberOfParcel = 1L;

    int parcelWidth = 800;
    int parcelHeight = 800;

    Species[] treeSpecies = {Species.dab, Species.brzoza, Species.klon,
            Species.jesion, Species.olsza, Species.leszczyna, Species.sosna,
            Species.kasztan, Species.topola, Species.jarzebina};


    public static void main(String[] args){

        new Tree();

    }

    public class Localization{

    int maxMumber = 6000; 

    private static int placeRand(){ return (int)(Math.random(maxMumber-1)); }

    }


    public PlotToSow() extends Localization{

        this.setSize(parcelWidth,parcelHeight);
        this.setLocation(Localization.placeRand());

                for(int i=0; i < Localization.maxMumber; ++i) {
                    SeedlingPlace tree = new SeedlingPlace(placeSetRandSpecies());
                    tree.setPlaceInPark(place);
                }

             }

    private Species placeSetRandSpecies(){ 
        Random randomGenerator = new Random();

        int randInt = randomGenerator.nextInt(10);

        return treeSpecies[randInt]; 

    }

}

public class SeedlingPlace {

   public SeedlingPlace(Species specie) {

       this.specie = specie;

   }

   public void setPlaceInPark(Graphics place) {
          place.setSpecies(specie);
          place.lokalization(Localization.placeRand());
   }

   public SeedlingPlace(Species specie) {
      this.specie = specie;
   }

   public void setPlaceInPark(Graphics place) {
      place.setSpecies(specie);
      place.lokalization(Localization.placeRand());
   }
}