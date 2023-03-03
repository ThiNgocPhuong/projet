package com.example.gedimagination;

public class Realisation {
    private String id;
    private String titre;
    private String description;
    private String debut;
    private String fin;

    public Realisation() {
        this.id="";
        this.titre="";
        this.description="";
    }

    public String getId() {
        return id;
    }

    public String getTitre() {
        return titre;
    }

    public String getDescription() {
        return description;
    }

    public String getDebut(){
        return debut;
    }

    public String getFin(){
        return fin;
    }


    public void setId(String id) {
        this.id=id;
    }

    public void setTitre(String titre) {
        this.titre=titre;
    }

    public void setDescription(String description) {
        this.description=description;
    }

    public void setDebut(String debut){this.debut=debut;}

    public void setFin(String fin){this.fin=fin;}


    @Override
    public String toString() {
        return "Concurrent{" +
                "id='" + id + '\'' +
                ", titre='" + titre+ '\'' +
                ", description='" + description +'\'' +
                ", debut='" + debut + '\'' +
                ", fin='" + fin +'\''+
                ", vote='" +
                '}';
    }
}

