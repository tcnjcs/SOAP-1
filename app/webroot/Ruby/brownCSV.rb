require 'csv'
class EPA
	def initialize(snum, stat, sname, add, own,fix, comment)
		@snum=snum
		@stat=stat
		@sname=sname
		@add=add
		@own=own
		@fix=fix
		@comment=comment
	end
	
	def outputfile
		File.open(epaformat.sql, 'a') { |file| file.write("INSERT INTO Brownfields VALUES("+ snum +"," sname+"," + stat + "," + fix + "," + own+");")}
	end
	
	def display
		puts snum + "\t" + sname + "\t" + stat + "\t" + fix + "\t" + own
	end
	
end

File.open("brown.csv", "r") do |infile|
	while(line=infile.gets)
		if(line=~ /^[0-9]*,.*$/)
			arr=Array.new
			arr=line.parse_csv
			puts arr[0]
			puts arr[1]
			puts arr[2]
			puts arr[3]
			puts arr[4]
			puts arr[5]
			puts arr[6]
			
			#omega=initialize(tsnum,tstat,tsname,tadd,town,tfix,tcomment)
			#omega.display
			#omega.outputfile()
		end
	end
end
