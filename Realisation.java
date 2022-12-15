package com.example.gedimagination;

public class Realisation {
    private String id;
    private String titre;
    private String description;

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

    public void setId(String id) {
        this.id=id;
    }

    public void setTitre(String titre) {
        this.titre=titre;
    }

    public void setDescription(String description) {
        this.description=description;
    }

    @Override
    public String toString() {
        return "Concurrent{" +
                "id='" + id + '\'' +
                ", titre='" + titre+ '\'' +
                ", description='" + description +
                '}';
    }
}

