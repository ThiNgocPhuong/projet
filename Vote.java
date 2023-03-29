package com.example.gedimagination;

public class Vote {
    private String code;
    private String email;
    private String date;
    private String id1;
    private int vote1;
    private String id2;
    private int vote2;
    private String id3;
    private int vote3;

    public Vote(){
        this.code="";
        this.email="";
        this.date="";
        this.id1="";
        this.vote1=0;
        this.id2="";
        this.vote2=0;
        this.id3="";
        this.vote3=0;
    }

    public String getCode(){return this.code;}

    public String getEmail(){return this.email;}

    public String getDate(){return this.date;}

    public String getId1() {
        return id1;
    }

    public int getVote1(){return this.vote1;}

    public String getId2() {
        return id2;
    }

    public int getVote2(){return this.vote2;}

    public String getId3() {
        return id3;
    }

    public int getVote3(){return this.vote3;}

    public void setCode(String code){this.code=code;}

    public void setEmail(String email){this.email=email;}

    public void setDate(String date) {
        this.date = date;
    }

    public  void setId1(String id1){this.id1=id1;}

    public void setVote1(int vote1){this.vote1=vote1;}

    public void setId2(String id2) {
        this.id2 = id2;
    }

    public void setVote2(int vote2){this.vote2=vote2;}

    public void setId3(String id3) {
        this.id3 = id3;
    }

    public void setVote3(int vote3){this.vote3=vote3;}

    @Override
    public String toString(){
        return "Vote{"+
                "code'" + code + '\''+
                ", email'"+ email + '\''+
                ", id1'" + id1 + '\'' +
                ", vote1'"+ vote1 + '\'' +
                ", id2'" + id2 + '\'' +
                ", vote2'"+ vote2 + '\'' +
                ", id3'" + id3 + '\'' +
                ", vote3'"+ vote3 +
                "}";
    }
}
