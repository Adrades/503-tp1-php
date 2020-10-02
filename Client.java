package com.company;

public class Client {
    private final int id;
    private String nom;
    public static int nombreClients = 0;

    public Client(String nom) {
        this.nom = nom;
        id = nombreClients;
        ++nombreClients;
    }

    public int getId() {
        return id;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getNom() {
        return nom;
    }
}
