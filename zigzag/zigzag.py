class Solution:
    def convert(self, s: str, numRows: int) -> str:
        
        str_len: int = len(s)
        #Checking
        if(str_len == 0):
            return ""
        if(numRows == 1):
            return s
        #


        res: str = ''
        group: int = numRows * 2 -2
        col_in_group: int = group - numRows + 1
        col_count: int = str_len // group * col_in_group
        if(str_len % group) > 0:
            if(str_len % group <= numRows):
                col_count = col_count + 1
            else:
                col_count = col_count + (str_len % group)

        lst = [['' for _ in range(col_count)] for _ in range(numRows)]
        
        x: int = 0
        y: int = 0
        dx: int = 0
        dy: int = 0
        for i in range(str_len):
            lst[y][x] = s[i]
            if(i % group < (numRows -1)):
                dy = 1
                dx = 0
            else:
                dy = -1
                dx = 1
            x = x + dx
            y = y + dy
            if ( y >= numRows):
                y = 0
                dy = 1
        for i in range(numRows):
            for j in range(col_count):
                if lst[i][j] != '':
                    res = res + lst[i][j]

        for i in range(numRows):
            print(lst[i])
        return res

if __name__ == '__main__':
    sol = Solution()
    print(sol.convert('ABCDE', 4))